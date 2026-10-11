
fetchAndSetData('/api/hero/list', {
    id: 'hero-id',
    title: 'hero-title',
    sub_title: 'hero-sub-title',
    description: 'hero-description',

    image: {
        id: 'hero-image-preview',
        type: 'image',
        path: 'admin/assets/img/hero'
    }
});

// HERO CREATE/UPDATE SCRIPT
async function submitHero() {
    const formData = new FormData();

    // die();
    const heroId = $('#hero-id').val() || '';
    const title = $('#hero-title').val();
    const subTitle = $('#hero-sub-title').val();
    const description = $('#hero-description').val();
    const image = $('#hero-image')[0].files[0];

    if (title.length === 0) {
        errorToast("Title is required");
        return;
    }
    if (subTitle.length === 0) {
        errorToast("Sub Title is required");
        return;
    }
    if (description.length === 0) {
        errorToast("description is required");
        return;
    }
    if (!image) {
        errorToast("image is required");
        return;
    }

    const isUpdate = heroId.length > 0;

    showLoader();
    formData.append('title', title);
    formData.append('sub_title', subTitle);
    formData.append('description', description);
    console.log(formData)
    if (image) {
        formData.append('image', image);
    }
    if (isUpdate) {
        formData.append('hero_id', heroId);
    }
    const response = await axios({
        method:'post' ,
        url: '/api/hero/store',
        data: formData,
        Headers: {
            'Content-Type': 'multipart/form-data',
        }
    });
    console.log(response.data.status);
}

// Preview image when file is selected
document.addEventListener('DOMContentLoaded', function () {

    // Hero image preview
    const heroImageInput = document.getElementById('hero-image');

    if (heroImageInput) {

        heroImageInput.addEventListener('change', function (e) {

            const file = e.target.files[0];

            if (file) {

                const reader = new FileReader();

                reader.onload = function (event) {

                    const heroImagePreview = document.getElementById('hero-image-preview');

                    if (heroImagePreview) {
                        heroImagePreview.src = event.target.result;
                    }

                };

                reader.readAsDataURL(file);
            }
        });
    }
});