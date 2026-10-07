async function hero() {
    try {
        const response = await axios.get('api/hero');
        // console.log(response);
        console.log(response.data.status);
        if (response.data.status === 'success') {
            const data = response.data.data;
            console.log(data);

            document.getElementById('hero-title').textContent = data.title ?? 'Softower Developer';
            document.getElementById('hero-sub-title').textContent = data.sub_title ?? 'I am Arif Billah Shobuz';
            document.getElementById('hero-description').textContent = data.description ?? 'I am Md. Arif Billah Shobuz, a passionate PHP Laravel Developer with hands-on experience in building web applications, eCommerce platforms, and dynamic websites. With a Diploma in Computer Science & Technology from Kushtia Polytechnic Institute and professional training from Kodeeo Limited, Ostad, and Webcoder-IT, I have honed my skills in Laravel, Git, Blade templates, JWT authentication, and project deployment';
            document.getElementById('hero-image').src = data.image
                ? `${window.location.origin}/userInterface/assets/img/profile/${data.image}`
                : `${window.location.origin}/userInterface/assets/img/hero/me.png`;

            // document.getElementById('hero-cv').href = data.cv
            //     ? `${window.location.origin}/userInterface/assets/cv/${data.cv}`
            //     : '#';

            document.getElementById('hero-facebook').href = data.facebook ?? 'https://www.facebook.com/arif.billah.shobuz';
            // document.getElementById('hero-instagram').href = data.instagram ?? '#';
            document.getElementById('hero-linkedin').href = data.linkedin ?? 'https://www.linkedin.com/in/arif-billah-shobuz';
            document.getElementById('hero-github').href = data.github ?? 'https://github.com/arifbillahshobuz';
            document.getElementById('hero-twitter').href = data.twitter ?? '#';
        }
    } catch (error) {
        console.log(error);
    }
}