async function service() {
    try {
        const response = await axios.get(`${window.location.origin}/api/service` );
        const services = response.data.data ?? [];
        const servicesWidget = document.querySelector('.services-widget');
        if (!servicesWidget) {
            console.error('Services widget not found!');
            return;
        }
        // Render services list
        servicesWidget.querySelectorAll('.service-item').forEach(item => {
            item.remove();
        });
        services.forEach((item, index) => {
            const serviceItem = document.createElement('div');

            serviceItem.className =
                `service-item ${index === 0 ? 'current' : ''} ` +
                'd-flex flex-wrap align-items-center wow fadeInUp';

            serviceItem.setAttribute('data-wow-delay', '.3s');

            serviceItem.innerHTML = `
                <div class="left-box d-flex flex-wrap align-items-center">
                    <span class="number">
                        ${String(index + 1).padStart(2, '0')}
                    </span>
                    <h3 class="service-title"></h3>
                </div>

                <div class="right-box">
                    <p></p>
                </div>

                <i class="fas fa-arrow-right"></i>

                <button
                    type="button"
                    data-mfp-src="#service-wrapper"
                    class="service-link modal-popup"
                    data-service-id="${item.id}"
                    aria-label="View service details">
                </button>
            `;

            serviceItem.querySelector('.service-title').textContent =
                item.name ?? '';

            serviceItem.querySelector('.right-box p').textContent =
                item.description ?? '';

            const activeBg = servicesWidget.querySelector('.active-bg');

            if (activeBg) {
                servicesWidget.insertBefore(serviceItem, activeBg);
            } else {
                servicesWidget.appendChild(serviceItem);
            }
        });

        // Populate All Services sidebar
        const sidebarList = document.getElementById('modal-all-services');

        if (sidebarList) {
            sidebarList.replaceChildren();

            services.forEach((item, index) => {
                const li = document.createElement('li');
                const button = document.createElement('button');

                if (index === 0) {
                    li.classList.add('active');
                }

                button.type = 'button';
                button.dataset.serviceId = item.id;

                const icon = document.createElement('i');
                icon.className = 'fas fa-laptop-code';

                button.append(icon, document.createTextNode(
                    ` ${item.name ?? ''}`
                ));

                li.appendChild(button);
                sidebarList.appendChild(li);
            });
        }

        // Update modal content for the selected service
        function setServiceDetails(serviceId) {
            const selectedService = services.find(
                item => Number(item.id) === Number(serviceId)
            );

            if (!selectedService) {
                console.error('Service not found:', serviceId);
                return;
            }

            document.getElementById('modal-service-name').textContent =
                selectedService.name ?? '';

            document.getElementById(
                'modal-service-short-description'
            ).textContent = selectedService.short_description ?? '';

            document.getElementById('modal-service-description').textContent =
                selectedService.description ?? '';

            document.getElementById('modal-service-process').textContent =
                selectedService.process ?? '';

            const image = document.getElementById('modal-service-image');

            const defaultImage = image.dataset.defaultImage;
             document.getElementById('modal-service-image').src = selectedService.image ? `${window.location.origin}/admin/assets/img/service/${services.image}` : `${window.location.origin}/admin/assets/img/service/service.jpeg`;
            // Highlight selected service in sidebar
            if (sidebarList) {
                sidebarList.querySelectorAll('li').forEach(li => {
                    li.classList.toggle(
                        'active',
                        Number(li.querySelector('button')?.dataset.serviceId) ===
                        Number(serviceId)
                    );
                });
            }

            // Highlight selected service in main list
            servicesWidget.querySelectorAll('.service-item').forEach(item => {
                item.classList.toggle(
                    'current',
                    Number(
                        item.querySelector('.modal-popup')?.dataset.serviceId
                    ) === Number(serviceId)
                );
            });
        }

        // Main service click: set data before popup opens
        jQuery(servicesWidget)
            .off('click.serviceModal', '.modal-popup')
            .on('click.serviceModal', '.modal-popup', function () {
                setServiceDetails(this.dataset.serviceId);
            });

        // Sidebar service click: change content without closing modal
        if (sidebarList) {
            sidebarList.onclick = function (event) {
                const button = event.target.closest('button[data-service-id]');

                if (!button) {
                    return;
                }

                setServiceDetails(button.dataset.serviceId);
            };
        }

        // Initialize Magnific Popup
        if (jQuery.fn.magnificPopup) {
            jQuery(servicesWidget).magnificPopup({
                delegate: '.modal-popup',
                type: 'inline',
                midClick: true
            });
        } else {
            console.error('Magnific Popup is not loaded!');
        }

        if (typeof WOW !== 'undefined') {
            new WOW().init();
        }

        console.log('Services loaded successfully:', services);

    } catch (error) {
        console.error(
            'Failed to load services:',
            error.response?.data ?? error.message
        );
    }
}
