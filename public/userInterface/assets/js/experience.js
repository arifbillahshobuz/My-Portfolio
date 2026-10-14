
async function experience() {
    const experienceWidget = document.querySelector(
        '#resume-section .col-md-6:first-child .resume-widget'
    );

    const educationWidget = document.querySelector(
        '#resume-section .col-md-6:last-child .resume-widget'
    );

    // default data
    const defaultExperiences = [
        {
            company: 'NIBIZ SOFT',
            designation: 'Software Developer / Laravel Developer',
            start_job: '2026-02-01',
            end_job: '2026-07-31',
            location: 'Dhaka, Bangladesh',
            owner: null,
            message: 'Engineering backend architectures and robust RESTful APIs using Laravel, PHP, and MySQL. Designing relational database schemas, optimizing Eloquent ORM queries, and integrating third-party services and payment gateways.'
        },
        {
            company: 'R2ait',
            designation: 'PHP Laravel Developer (Backend Developer)',
            start_job: '2025-08-01',
            end_job: '2026-01-31',
            location: 'Banasree, Rampura, Dhaka 1212',
            owner: null,
            message: 'Built and maintained scalable web applications using Laravel and PHP. Configured and deployed applications on Hostinger servers. Collaborated with Flutter developers through GitHub and followed clean coding and version-control practices.'
        },
        {
            company: 'DevTechMasters',
            designation: 'PHP Laravel Developer (Remote Job)',
            start_job: '2024-01-01',
            end_job: '2024-12-31',
            location: 'Remote',
            owner: null,
            message: 'Integrated modern frontend components using React.js and Tailwind CSS. Applied Laravel and PHP best practices and contributed to feature implementation, bug resolution, troubleshooting, and continuous product enhancement.'
        },
        {
            company: 'Codeeo Limited',
            designation: 'PHP Laravel (Paid Intern)',
            start_job: '2023-08-01',
            end_job: '2023-12-31',
            location: 'Nikunja 2, Khilkhet, Dhaka-1229',
            owner: null,
            message: 'Implemented REST APIs and payment gateway integrations with OAuth/JWT-based authentication. Configured and deployed applications on Hostinger servers.'
        }
    ];

    // PDF CV অনুযায়ী Education data
    const defaultEducations = [
        {
            time: '2023 - Present',
            title: 'B.Sc in Computer Science and Engineering (CSE)',
            institute: 'Dhaka International University'
        },
        {
            time: '2019 - 2024',
            title: 'Diploma in Engineering (Computer Science & Technology)',
            institute: 'Kushtia Polytechnic Institute'
        }
    ];

    // তারিখকে Month Year format-এ দেখাবে
    function formatMonthYear(date) {
        if (!date) {
            return 'Present';
        }

        const parsedDate = new Date(`${String(date).slice(0, 10)}T00:00:00`);

        if (Number.isNaN(parsedDate.getTime())) {
            return String(date);
        }

        return parsedDate.toLocaleDateString('en-US', {
            month: 'short',
            year: 'numeric'
        });
    }

    // Experience-এর জন্য HTML element তৈরি করবে
    function renderExperiences(experiences) {
        if (!experienceWidget) return;

        experienceWidget.replaceChildren();

        experiences.forEach((item, index) => {
            const resumeItem = document.createElement('div');
            resumeItem.className = 'resume-item wow fadeInLeft';
            resumeItem.setAttribute(
                'data-wow-delay',
                `${0.4 + index * 0.1}s`
            );

            const time = document.createElement('div');
            time.className = 'time';

            const start = formatMonthYear(item.start_job);
            const end = item.end_job
                ? formatMonthYear(item.end_job)
                : 'Present';

            time.textContent = `${start} - ${end}`;

            const title = document.createElement('h3');
            title.className = 'resume-title';
            title.textContent = item.designation ?? '';

            const institute = document.createElement('div');
            institute.className = 'institute';

            const company = item.company ?? '';
            const location = item.location ?? '';

            institute.textContent = location
                ? `${company}, ${location}`
                : company;

            resumeItem.append(time, title, institute);
            experienceWidget.appendChild(resumeItem);
        });
    }

    // Education-এর জন্য HTML element তৈরি করবে

    function renderEducations(educations) {
        if (!educationWidget) return;

        educationWidget.replaceChildren();

        educations.forEach((item, index) => {
            const resumeItem = document.createElement('div');
            resumeItem.className = 'resume-item wow fadeInRight';
            resumeItem.setAttribute(
                'data-wow-delay',
                `${0.5 + index * 0.1}s`
            );

            const time = document.createElement('div');
            time.className = 'time';

            // API data অথবা default fallback data
            if (item.time) {
                time.textContent = item.time;
            } else {
                const start = item.start_date
                    ? formatMonthYear(item.start_date)
                    : '';

                const end = item.end_date
                    ? formatMonthYear(item.end_date)
                    : 'Present';

                time.textContent = `${start} - ${end}`;
            }

            const title = document.createElement('h3');
            title.className = 'resume-title';
            title.textContent = item.title
                ?? [item.degree, item.field_of_study]
                    .filter(Boolean)
                    .join(' - ');

            const institute = document.createElement('div');
            institute.className = 'institute';

            institute.textContent = item.institute
                ?? [item.institution, item.location]
                    .filter(Boolean)
                    .join(', ');

            resumeItem.append(time, title, institute);
            educationWidget.appendChild(resumeItem);
        });
    }


    // প্রথমে PDF CV-এর fallback data দেখাবে
    renderExperiences(defaultExperiences);
    renderEducations(defaultEducations);

    // API থেকে Experience data আনার চেষ্টা করবে
    try {
        const response = await axios.get(
            `${window.location.origin}/api/experience`
        );

        if (response.data.status === 'success') {
            const result = response.data.data;

            // API-তে অন্তত একটি Experience থাকলেই fallback replace হবে
            if (Array.isArray(result) && result.length > 0) {
                renderExperiences(result);
            } else if (result && Array.isArray(result.data) && result.data.length > 0) {
                renderExperiences(result.data);
            }
        }
    } catch (error) {
        console.error('Experience API Error:', error);
        // API error হলে PDF CV-এর default data-ই থাকবে
    }
       // API থেকে Education data আনা
    try {
        const response = await axios.get(
            `${window.location.origin}/api/education`
        );

        if (response.data.status === 'success') {
            const result = response.data.data;

            if (Array.isArray(result) && result.length > 0) {
                renderEducations(result);
            }
        }
    } catch (error) {
        console.error('Education API Error:', error);

        // API error হলে default Education data থাকবে
    }
}

