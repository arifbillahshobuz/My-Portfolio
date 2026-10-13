
async function project() {
    try {
        const response = await axios.get('/api/project');
        if (response.data.status !== 'success') {
            return;
        }
        const projects = response.data.data;
        const portfolioBox = document.querySelector('.portfolio-box');
        const filterGroup = document.querySelector('.filter-button-group');

        if (!portfolioBox) {
            console.error('Portfolio box not found.');
            return;
        }

        // Remove existing static portfolio items
        portfolioBox.querySelectorAll('.portfolio-item').forEach(item => {
            item.remove();
        });

        // Generate CSS class from service name
        function makeSlug(value) {
            return String(value ?? 'other')
                .toLowerCase()
                .trim()
                .replace(/[^a-z0-9]+/g, '-')
                .replace(/^-|-$/g, '') || 'other';
        }

        // Escape HTML to prevent broken markup
        function escapeHtml(value) {
            return String(value ?? '').replace(/[&<>"']/g, char => ({
                '&': '&amp;',
                '<': '&lt;',
                '>': '&gt;',
                '"': '&quot;',
                "'": '&#039;'
            })[char]);
        }

        // Resolve image URL
        function projectImage(image) {
            return image
                ? `${window.location.origin}/admin/assets/img/project/${image}`
                : `${window.location.origin}/admin/assets/img/project/defaultProject.png`;
        }

        // Format date
        function formatDate(date) {
            if (!date) return 'N/A';

            const parsedDate = new Date(`${date}T00:00:00`);

            if (Number.isNaN(parsedDate.getTime())) {
                return date;
            }

            return parsedDate.toLocaleDateString('en-US', {
                year: 'numeric',
                month: 'long',
                day: 'numeric'
            });
        }

        // Generate service filter buttons
        if (filterGroup) {
            filterGroup.querySelectorAll('button:not([data-filter="*"])')
                .forEach(button => button.remove());

            const services = [
                ...new Map(
                    projects
                        .filter(item => item.service)
                        .map(item => [
                            item.service.name,
                            item.service.name
                        ])
                ).keys()
            ];

            services.forEach(serviceName => {
                const button = document.createElement('button');

                button.dataset.filter = `.${makeSlug(serviceName)}`;
                button.textContent = serviceName;

                filterGroup.insertBefore(
                    button,
                    filterGroup.querySelector('.active-bg')
                );
            });
        }

        // Render projects
        projects.forEach(item => {
            const serviceName = item.service?.name ?? 'Other';
            const clientName = item.client?.name ?? 'N/A';

            const imageUrl = projectImage(item.image, '1.jpg');

            const portfolioItem = document.createElement('div');

            portfolioItem.className =
                `portfolio-item ${makeSlug(serviceName)}`;

            portfolioItem.innerHTML = `
                <div class="image-box">
                    <img src="${escapeHtml(imageUrl)}"
                         alt="${escapeHtml(item.name)}"
                         loading="lazy">
                </div>

                <div class="content-box">
                    <h3 class="portfolio-title">
                        ${escapeHtml(item.name)}
                    </h3>

                    <p>
                        Client: ${escapeHtml(clientName)}
                    </p>

                    <i class="fas fa-arrow-right"></i>

                    <button
                        data-mfp-src="#portfolio-wrapper"
                        class="portfolio-link modal-popup"
                        type="button"
                        aria-label="View ${escapeHtml(item.name)} details">
                    </button>
                </div>
            `;

            // Store project data for popup
            const popupButton = portfolioItem.querySelector('.modal-popup');

            popupButton.addEventListener('click', () => {
                openProjectPopup(item);
            });

            portfolioBox.appendChild(portfolioItem);
        });


        // Initialize or refresh Isotope
        let iso = null;

        if (typeof Isotope !== 'undefined') {
            iso = Isotope.data(portfolioBox);

            if (iso) {
                iso.reloadItems();
                iso.arrange({ filter: '*' });
            } else {
                iso = new Isotope(portfolioBox, {
                    itemSelector: '.portfolio-item',
                    percentPosition: true,
                    masonry: {
                        columnWidth: '.portfolio-sizer',
                        gutter: '.gutter-sizer'
                    }
                });
            }
        }

        // Portfolio filter and active background
        if (filterGroup) {
            const activeBg = filterGroup.querySelector('.active-bg');
            const filterButtons = filterGroup.querySelectorAll(
                'button[data-filter]'
            );

            function moveActiveBackground(button) {
                if (!activeBg || !button) return;

                const groupRect = filterGroup.getBoundingClientRect();
                const buttonRect = button.getBoundingClientRect();

                activeBg.style.left =
                    `${buttonRect.left - groupRect.left}px`;

                activeBg.style.right = 'auto';
                activeBg.style.width = `${buttonRect.width}px`;
                activeBg.style.top = `${button.offsetTop}px`;
                activeBg.style.height = `${button.offsetHeight}px`;
                activeBg.style.bottom = 'auto';
            }

            filterButtons.forEach(button => {
                button.addEventListener('click', function () {
                    filterButtons.forEach(btn => {
                        btn.classList.remove('active');
                    });

                    this.classList.add('active');

                    // Apply selected filter
                    if (iso) {
                        iso.arrange({
                            filter: this.dataset.filter
                        });
                    }

                    // Move active background
                    requestAnimationFrame(() => {
                        moveActiveBackground(this);
                    });
                });
            });

            // Position background on initial load
            const activeButton =
                filterGroup.querySelector('button.active') ||
                filterGroup.querySelector('[data-filter="*"]');

            if (activeButton) {
                requestAnimationFrame(() => {
                    moveActiveBackground(activeButton);
                });
            }

            // Reposition on window resize
            window.addEventListener('resize', () => {
                const currentActive =
                    filterGroup.querySelector('button.active');

                if (currentActive) {
                    moveActiveBackground(currentActive);
                }
            });
        }

    } catch (error) {
        console.error('Project fetch error:', error);
    }
}


// Update existing popup HTML using JavaScript only
function openProjectPopup(item) {
    const popup = document.querySelector('#portfolio-wrapper');

    if (!popup) {
        console.error('Portfolio popup not found.');
        return;
    }

    function escapeHtml(value) {
        return String(value ?? '').replace(/[&<>"']/g, char => ({
            '&': '&amp;',
            '<': '&lt;',
            '>': '&gt;',
            '"': '&quot;',
            "'": '&#039;'
        })[char]);
    }


    function imageUrl(image) {
        return image
            ? `${window.location.origin}/admin/assets/img/project/${image}`
            : `${window.location.origin}/admin/assets/img/project/defaultProject.png`;
    }


    const detail = item.detail ?? {};
    const serviceName = item.service?.name ?? 'N/A';
    const clientName = item.client?.name ?? 'N/A';

    // Main popup image and title
    const mainImage = popup.querySelector('.popup_modal_img img');

    if (mainImage) {
        mainImage.src = imageUrl(item.image, 'modal-img.jpg');
        mainImage.alt = item.name ?? 'Project';
    }

    const title = popup.querySelector('.portfolio_info_text .title');

    if (title) {
        title.textContent = item.name ?? 'Untitled Project';
    }

    // Project summary
    const summary = popup.querySelector('.portfolio_info_text .desc p');

    if (summary) {
        summary.textContent =
            detail.short_description ??
            detail.description ??
            item.name ??
            '';
    }

    // Live project URL, if available
    const livePreview = popup.querySelector('.portfolio_info_text > a');

    if (livePreview) {
        const website = detail.website ?? item.website ?? '';

        livePreview.href = website || '#';
        livePreview.target = website ? '_blank' : '_self';
        livePreview.rel = website ? 'noopener noreferrer' : '';
        livePreview.style.display = website ? '' : 'none';
    }

    // Project information
    const infoValues = popup.querySelectorAll(
        '.portfolio_info_items .info_item .value'
    );

    const values = [
        serviceName,
        clientName,
        formatPopupDate(item.start_date),
        detail.designer ?? 'N/A'
    ];

    infoValues.forEach((element, index) => {
        if (index < values.length) {
            element.textContent = values[index];
        }
    });

    // Project description
    const description = popup.querySelector('.portfolio_description .desc');

    if (description) {
        description.innerHTML = `
            <p>${escapeHtml(detail.description ?? '')}</p>
        `;
    }

    // Project story
    const story = popup.querySelector('.portfolio_story .story_content');

    if (story) {
        story.innerHTML = `
            <p>${escapeHtml(detail.story ?? '')}</p>
        `;
    }

    // Project approach
    const approach = popup.querySelector('.portfolio_approach .approach_content');

    if (approach) {
        approach.innerHTML = `
            <p>${escapeHtml(detail.approach ?? '')}</p>
        `;
    }

    // Gallery: retain existing gallery HTML and replace first image

    const gallery = popup.querySelector('.portfolio_gallery');

    if (gallery) {
        const galleryImages = gallery.querySelectorAll('.gallery_item img');

        // Get multiple images from project detail
        const galleryData = Array.isArray(item.detail?.images)
            ? item.detail.images
            : [];

        galleryImages.forEach((img, index) => {
            const galleryImage = galleryData[index];

            img.src = galleryImage
                ? `${window.location.origin}/admin/assets/img/project/${galleryImage}`
                : `${window.location.origin}/admin/assets/img/project/defaultProject.png`;

            img.alt = `${item.name ?? 'Project'} image ${index + 1}`;
        });

        // Refresh Owl Carousel
        if (
            window.jQuery &&
            jQuery.fn.owlCarousel &&
            jQuery(gallery).hasClass('owl-loaded')
        ) {
            jQuery(gallery).trigger('refresh.owl.carousel');
        }
    }


    // Open existing Magnific Popup
    if (window.jQuery && jQuery.fn.magnificPopup) {
        jQuery.magnificPopup.open({
            items: {
                src: '#portfolio-wrapper'
            },
            type: 'inline',
            midClick: true,
            mainClass: 'mfp-fade'
        });
    }
}

function formatPopupDate(date) {
    if (!date) return 'N/A';

    const parsedDate = new Date(`${date}T00:00:00`);

    if (Number.isNaN(parsedDate.getTime())) {
        return date;
    }

    return parsedDate.toLocaleDateString('en-US', {
        year: 'numeric',
        month: 'long',
        day: 'numeric'
    });
}
