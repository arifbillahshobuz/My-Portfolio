async function service() {
    try {
        const response = await axios.get(`${window.location.origin}/api/service`);

        // Get services data from API response
        const services = response.data.data;

        // Select services widget
        const servicesWidget = document.querySelector('.services-widget');

        if (!servicesWidget) {
            console.error('Services widget not found!');
            return;
        }

        // Remove old static service items
        servicesWidget.querySelectorAll('.service-item').forEach(item => {
            item.remove();
        });

        // Generate service items dynamically
        services.forEach((item, index) => {
            const serviceItem = document.createElement('div');

            serviceItem.className = `service-item ${
                index === 0 ? 'current' : ''
            } d-flex flex-wrap align-items-center wow fadeInUp`;

            serviceItem.setAttribute('data-wow-delay', '.3s');

            serviceItem.innerHTML = `
                <div class="left-box d-flex flex-wrap align-items-center">
                    <span class="number">
                        ${String(index + 1).padStart(2, '0')}
                    </span>

                    <h3 class="service-title">
                        ${item.name ?? ''}
                    </h3>
                </div>

                <div class="right-box">
                    <p>${item.description ?? ''}</p>
                </div>

                <i class="fas fa-arrow-right"></i>

                <button
                    data-mfp-src="#service-wrapper"
                    class="service-link modal-popup"
                    data-service-id="${item.id}"
                    aria-label="View ${item.name ?? 'service'} details">
                </button>
            `;

            // Insert before active background
            const activeBg = servicesWidget.querySelector('.active-bg');

            if (activeBg) {
                servicesWidget.insertBefore(serviceItem, activeBg);
            } else {
                servicesWidget.appendChild(serviceItem);
            }
        });

        // Reinitialize WOW animations if available
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

