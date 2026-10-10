<div id="service-wrapper" class="popup_content_area zoom-anim-dialog mfp-hide"> 
    <div class="popup_modal_img">
        <img id="modal-service-image" src="{{ asset('userInterface/assets/img/services/modal-img.jpg') }}" alt="" />
    </div>
    <div class="popup_modal_content">
        <div class="service_details">
            <div class="row">
                <!-- Service Details -->
                <div class="col-lg-7 col-xl-8">
                    <div class="service_details_content">
                        <div class="service_info">
                            <h6 class="subtitle">SERVICES</h6>
                            <h2 class="title" id="modal-service-name">
                                Service Name
                            </h2>
                            <div class="desc">
                                <p id="modal-service-short-description"></p>
                                <p id="modal-service-description"></p>
                            </div>
                            <h3 class="title">Services Process</h3>
                            <div class="desc">
                                <p id="modal-service-process"></p>
                            </div>
                        </div>                        
                    </div>
                </div>
                <!-- Sidebar -->
                <div class="col-lg-5 col-xl-4">
                    <div class="tj_main_sidebar">
                        <!-- All Services -->
                        <div class="sidebar_widget services_list">
                            <div class="widget_title">
                                <h3 class="title">All Services</h3>
                            </div>
                            <ul id="modal-all-services">
                                <!-- Services will load dynamically -->
                            </ul>
                        </div>
                        <!-- Contact Form: Original Design -->
                        <div class="sidebar_widget contact_form">
                            <div class="widget_title">
                                <h3 class="title">Get in Touch</h3>
                            </div>
                            <form action="index.html">
                                <div class="form_group">
                                    <input type="text" name="name" id="name" placeholder="Name" autocomplete="off" />
                                </div>
                                <div class="form_group">
                                    <input type="email" name="semail" id="semail" placeholder="Email" autocomplete="off" />
                                </div>
                                <div class="form_group">
                                    <textarea name="smessage" id="smessage" placeholder="Your message" autocomplete="off"></textarea>
                                </div>
                                <div class="form_btn">
                                    <button class="btn tj-btn-primary" type="submit"> Send Message </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>