<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<div class="col-md-3 col-sm-4">
    <div class="steps">
        <h1>Step 6 : Final Step</h1>
        <div class="gold-box">
            <h2>Get your Door</h2>
            <div class="row">
                <div>
                    <img src="images/FullFrames/<?php echo $_SESSION['CurrentDesign']; ?>" class="img-responsive" alt="Image" />
                    <div class="text-center">
                        <input type="file" class="stepbtn" id="fileUpload" style="display: none;" />
                        <input type="button" value="Upload Your House Image" class="stepbtn" onclick="document.getElementById('fileUpload').click();" />
                        <button type="button" class="stepbtn" onclick="addCurrentImage('images/FullFrames/<?php echo $_SESSION['CurrentDesign']; ?>')">Add Created Image</button>
                        <button type="button" class="stepbtn" onclick="SendMail()">Send Email For Enquiry</button>
                    </div>
                </div> 
            </div>
        </div>
        <br />
        <div class="row">
            <div class="col-xs-6">
                <a href="#" onclick="replace('step6', 'step1');">
                    <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                         width="20px" height="20px" viewBox="0 0 284.929 284.929" style="enable-background:new 0 0 284.929 284.929;"
                         xml:space="preserve">
                        <g>
                            <path d="M165.304,142.468L277.517,30.267c1.902-1.903,2.847-4.093,2.847-6.567c0-2.475-0.951-4.665-2.847-6.567L263.239,2.857
                                  C261.337,0.955,259.146,0,256.676,0c-2.478,0-4.665,0.955-6.571,2.857L117.057,135.9c-1.903,1.903-2.853,4.093-2.853,6.567
                                  c0,2.475,0.95,4.664,2.853,6.567l133.048,133.043c1.903,1.906,4.086,2.851,6.564,2.851c2.478,0,4.66-0.947,6.563-2.851
                                  l14.277-14.267c1.902-1.903,2.851-4.094,2.851-6.57c0-2.472-0.948-4.661-2.851-6.564L165.304,142.468z" />

                            <path d="M55.668,142.468L167.87,30.267c1.903-1.903,2.851-4.093,2.851-6.567c0-2.475-0.947-4.665-2.851-6.567L153.6,2.857
                                  C151.697,0.955,149.507,0,147.036,0c-2.478,0-4.668,0.955-6.57,2.857L7.417,135.9c-1.903,1.903-2.853,4.093-2.853,6.567
                                  c0,2.475,0.95,4.664,2.853,6.567l133.048,133.043c1.902,1.906,4.09,2.851,6.57,2.851c2.471,0,4.661-0.947,6.563-2.851
                                  l14.271-14.267c1.903-1.903,2.851-4.094,2.851-6.57c0-2.472-0.947-4.661-2.851-6.564L55.668,142.468z" />

                        </g>
                    </svg>
                </a>
            </div>
        </div>
    </div>
</div>
<script>
    const EL = (sel) => document.querySelector(sel);
    EL("#fileUpload").addEventListener("change", readImage);
</script>