
async function skill() {
    const skillsWidget = document.querySelector('.skills-widget');

    if (!skillsWidget) return;

    const defaultSkills = [
        { name: 'PHP', category: 'Languages', percentage: 85, icon: null },
        { name: 'JavaScript', category: 'Languages', percentage: 80, icon: null },
        { name: 'Python', category: 'Languages', percentage: 60, icon: null },
        { name: 'C', category: 'Languages', percentage: 55, icon: null },
        { name: 'C++', category: 'Languages', percentage: 55, icon: null },
        { name: 'Java', category: 'Languages', percentage: 55, icon: null },
        { name: 'SQL', category: 'Languages', percentage: 75, icon: null },
        { name: 'HTML5', category: 'Languages', percentage: 90, icon: null },
        { name: 'CSS3', category: 'Languages', percentage: 85, icon: null },
        { name: 'Laravel', category: 'Frameworks & Technologies', percentage: 90, icon: null },
        { name: 'Eloquent ORM', category: 'Frameworks & Technologies', percentage: 85, icon: null },
        { name: 'RESTful APIs', category: 'Frameworks & Technologies', percentage: 85, icon: null },
        { name: 'React.js', category: 'Frameworks & Technologies', percentage: 70, icon: null },
        { name: 'Next.js', category: 'Frameworks & Technologies', percentage: 65, icon: null },
        { name: 'Tailwind CSS', category: 'Frameworks & Technologies', percentage: 80, icon: null },
        { name: 'MySQL', category: 'Databases & DevOps', percentage: 85, icon: null },
        { name: 'PostgreSQL', category: 'Databases & DevOps', percentage: 70, icon: null },
        { name: 'MongoDB', category: 'Databases & DevOps', percentage: 60, icon: null },
        { name: 'Git', category: 'Databases & DevOps', percentage: 80, icon: null },
        { name: 'GitHub', category: 'Databases & DevOps', percentage: 85, icon: null },
        { name: 'Linux', category: 'Databases & DevOps', percentage: 65, icon: null },
        { name: 'Apache', category: 'Databases & DevOps', percentage: 60, icon: null },
        { name: 'Postman', category: 'Databases & DevOps', percentage: 85, icon: null }
    ];

    function renderSkills(skills) {
        skillsWidget.replaceChildren();

        skills.forEach((item, index) => {
            const skillItem = document.createElement('div');
            skillItem.className = 'skill-item wow fadeInUp';
            skillItem.setAttribute(
                'data-wow-delay',
                `${0.3 + (index % 6) * 0.1}s`
            );

            const skillInner = document.createElement('div');
            skillInner.className = 'skill-inner';

            const iconBox = document.createElement('div');
            iconBox.className = 'icon-box';

            if (item.icon) {
                const image = document.createElement('img');
                image.src = item.icon.startsWith('http')
                    ? item.icon
                    : `${window.location.origin}/admin/assets/img/icons/${item.icon}`;
                image.alt = item.name ?? 'Skill icon';
                image.loading = 'lazy';

                image.onerror = function () {
                    const fallback = document.createElement('span');
                    fallback.textContent = (item.name ?? '?').slice(0, 2).toUpperCase();
                    iconBox.replaceChildren(fallback);
                };

                iconBox.appendChild(image);
            } else {
                const fallback = document.createElement('span');
                fallback.textContent = (item.name ?? '?').slice(0, 2).toUpperCase();
                fallback.setAttribute('aria-label', item.name ?? 'Skill');
                iconBox.appendChild(fallback);
            }

            const number = document.createElement('div');
            number.className = 'number';
            number.textContent = `${item.percentage ?? 50}%`;

            const name = document.createElement('p');
            name.textContent = item.name ?? '';

            skillInner.append(iconBox, number);
            skillItem.append(skillInner, name);
            skillsWidget.appendChild(skillItem);
        });
    }

    // প্রথমে CV অনুযায়ী default skills দেখাবে
    renderSkills(defaultSkills);

    // তারপর API থেকে database skills আনার চেষ্টা করবে
    try {
        const response = await axios.get(
            `${window.location.origin}/api/skill`
        );

        if (response.data.status === 'success') {
            const result = response.data.data;

            if (Array.isArray(result) && result.length > 0) {
                renderSkills(result);
            }
        }
    } catch (error) {
        console.error('Skills API Error:', error);
        // API error হলে default skills থাকবে
    }
}
