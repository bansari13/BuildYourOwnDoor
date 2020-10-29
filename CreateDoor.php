<?php include('db.php'); ?>
<?php include('Header.php'); ?>
<section>
        <div class="wow fadeIn">
            <div class="container-fluid">
                <div class="row" id="mainContainer">
                    <div id="step1" style="display: block;">
                        <div class="col-sm-3">
                            <div class="steps">
                                <h1>Step 1 : Select Frame</h1>
                                <div class="gold-box">
                                    <h2>Single & Double Frames</h2>
                                    <div id="owl1" class="owl-carousel owl-theme">
                                        <div class="row">
                                            <?php
                                            $query = "SELECT * FROM Frames";
                                            $result_tasks = mysqli_query($conn, $query);
                                            while ($row = mysqli_fetch_assoc($result_tasks)) {
                                                ?>
                                            <div class="col-sm-6">
                                                <a onclick="getFrame('images/<?php echo $row['Image']; ?>','<?php echo $row['ID']; ?>')">
                                                    <img src="images/<?php echo $row['Image'] ?>" class="img-responsive" alt="Image" />
                                                </a>
                                            </div>
                                            <?php } ?>
                                            
                                        </div>
                                    </div>
                                    <input type="hidden" id="frameID" />
                                </div>
                                <br />
                                <div class="row">
                                    <div class="col-sm-6">
                                        <a href="#">
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
			l14.271-14.267c1.903-1.903,2.851-4.094,2.851-6.57c0-2.472-0.947-4.661-2.851-6.564L55.668,142.468z" /></g>
                                        </svg>
                                        </a>
                                    </div>
                                    <div class="col-sm-6">
                                        <a href="#" onclick="replace();">
                                            <svg style="float: right;" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                 width="20px" height="20px" viewBox="0 0 284.936 284.936" style="enable-background:new 0 0 284.936 284.936;"
                                                 xml:space="preserve">
                                            <g>
                                            <path d="M277.515,135.9L144.464,2.857C142.565,0.955,140.375,0,137.9,0c-2.472,0-4.659,0.955-6.562,2.857l-14.277,14.275
			c-1.903,1.903-2.853,4.089-2.853,6.567c0,2.478,0.95,4.664,2.853,6.567l112.207,112.204L117.062,254.677
			c-1.903,1.903-2.853,4.093-2.853,6.564c0,2.477,0.95,4.667,2.853,6.57l14.277,14.271c1.902,1.905,4.089,2.854,6.562,2.854
			c2.478,0,4.665-0.951,6.563-2.854l133.051-133.044c1.902-1.902,2.851-4.093,2.851-6.567S279.417,137.807,277.515,135.9z" /><path d="M170.732,142.471c0-2.474-0.947-4.665-2.857-6.571L34.833,2.857C32.931,0.955,30.741,0,28.267,0s-4.665,0.955-6.567,2.857
			L7.426,17.133C5.52,19.036,4.57,21.222,4.57,23.7c0,2.478,0.95,4.664,2.856,6.567L119.63,142.471L7.426,254.677
			c-1.906,1.903-2.856,4.093-2.856,6.564c0,2.477,0.95,4.667,2.856,6.57l14.273,14.271c1.903,1.905,4.093,2.854,6.567,2.854
			s4.664-0.951,6.567-2.854l133.042-133.044C169.785,147.136,170.732,144.945,170.732,142.471z" /></g>
                                        </svg>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="step2" style="display: none;">
                        
                    </div>
                    <div class="col-sm-7 containerStyle" id="container">
                        
                    </div>
                    <div class="col-sm-2" id="reminderText">
                        <div class="reminder"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<script src="https://cdnjs.cloudflare.com/ajax/libs/konva/7.1.3/konva.min.js"></script>
<script src="js/CreateDoor.js"></script>
<?php include('Footer.php'); ?>