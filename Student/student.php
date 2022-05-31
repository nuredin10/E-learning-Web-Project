<?php

include '../Footer/Header.php';
include '../config.php';
// include '../Login-Signup/loginSignupQuery.php';

if (isset($_GET['file_id'])) {
    $id = $_GET['file_id'];

    $sql2 = "SELECT * FROM tblonlinematerials WHERE id = '$id'";

    $downloadResult = mysqli_query($connect, $sql2);
    $file = mysqli_fetch_assoc($downloadResult);
    $filePath = 'uploaded_materials/' . $file['materials'];
    // echo $filePath;
    if (file_exists($filePath)) {
        header('Content-Type: application/octet-stream');
        header('Content-Description: File Transfer');
        header('Content-Disposition: attachment; filename=' . basename($filePath));
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma:Public');

        header('Content-Length:' . filesize('uploaded_materials/' . $file['materials']));
        readfile('uploaded_materials/' . $file['materials']);
    }
}


if (isset($_GET['assignment_id'])) {
    $id = $_GET['assignment_id'];

    $sql = "SELECT * FROM tblactivities WHERE id = '$id'";
    $downloadResult = mysqli_query($connect, $sql);
    $file = mysqli_fetch_assoc($downloadResult);
    $filePath = '../Teacher/assignments/' . $file['assignment'];
    // echo $filePath;
    if (file_exists($filePath)) {
        header('Content-Type: application/octet-stream');
        header('Content-Description: File Transfer');
        header('Content-Disposition: attachment; filename=' . basename($filePath));
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma:Public');

        header('Content-Length:' . filesize('../Teacher/assignments/' . $file['assignment']));
        readfile('../Teacher/assignments/' . $file['assignment']);
    }
}


?>
<link rel="stylesheet" href="../Home-page/Home-page.css" />
<link rel="stylesheet" href="../Teacher/Teacher.css">
<link rel="stylesheet" href="student.css">
<link rel="stylesheet" href="../Footer/header.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous" />


<style>


  @media (max-width: 800px) {
    .activities-wrapper{
        /* border: 1px solid red; */
        width: 100%;
    }

    .image-part{
        /* width: 100px */
        display: none;
    }

    .teacher-side{
        width: 98%;
    }

    .student-side{
      width: 98%;
      margin-left: 0%;
    }
  }
</style>


<body>
    <div class="teacher-wrapper">
        <!-- <div class="teacher-menu">
            <ul>
                <li><button value="stream">Stream</button></li>
                <li><button value="activitie">Activitie</button></li>
                <li><button value="people">People</button></li>
                <li><button value="grade">Grade</button></li>
            </ul>
        </div> -->

        <div class="" id="stream">


            <div class="start-lecture join-lecture">
                <!-- <div class="dropdown">
                    <button class="dropbtn">Select a Course</button>
                    <div class="dropdown-content">
                      <a href="#">Programming Skill</a>
                      <a href="#">Design</a>
                      <a href="#">Marketing</a>
                      <a href="#">Buisness</a>
                    </div>
                  </div> -->
                <div>
                    <p>Join Zoom And Attend The Class</p>
                    <button class="start-lecture-btn">Join Lecture Now</button>
                </div>


                <!-- <button id="messageBtn">Start Messaging</button> -->
            </div>
            <div class="space">
                <p>Start Your Chat Here </p>
                <p>Share your materials for students</p>
            </div>
            <div class="chat-material">

            <div class="chat-box">
                <div class="inner-chat">
                    <div class="chat-history">
                        <div class="chat outgoing">
                            <p>
                                Lorem sdipsum dolor sit amet, consectetur adipisicing elit.
                            </p>
                        </div>
                        <div class="chat incoming">
                            <h4 class="username">username</h4>

                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                        </div>
                        <div class="chat outgoing">
                            <p>
                                Lorem sdipasdddddsum dolor sit amet, consectetur adipisicing
                                elit.
                            </p>
                        </div>
                        <div class="chat incoming">
                            <h4>username</h4>

                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                        </div>
                        <div class="chat outgoing">
                            <p>
                                Lorem sdipsum dolor sit amet, consectetur adipisicing elit.
                            </p>
                        </div>
                        <div class="chat incoming">
                            <h4>username</h4>

                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                        </div>
                        <div class="chat outgoing">
                            <p>
                                Lorem sdipsum dolor sit amet, consectetur adipisicing elit.
                            </p>
                        </div>
                        <div class="chat incoming">
                            <h4>username</h4>

                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                        </div>
                    </div>
                    <div class="type-chat">
                        <button class="emoji-button second-btn"></button>
                        <form action="" method="post">
                            <textarea id="message" name="" class="two uk-textarea uk-margin uk-height-medium" placeholder="Type a message here..."></textarea>
                            <!-- <input type="submit" value=""><i></i> -->
                            <button id="send-message">
                                <i class="fab fa-telegram-plane"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="calendar">
                <div class="material-wrapper">
                    <div class="material">

                        <table>



                            <?php


                            // $download ="Download";
                            $sql1 = "SELECT * FROM tblonlinematerials";
                            $res = mysqli_query($connect, $sql1);
                            while ($files = mysqli_fetch_assoc($res)) {
                                // $id = $files['id'];

                                echo "<tr >";
                                echo "<td class='title'>" . $files['title'] . "</td>";
                                echo "</tr>";
                                echo "<tr>";
                                echo "<td class='download-link'><a href='./student.php?file_id=" . $files['id'] . "'>Download</a></td>";
                                echo "</tr>";
                            }

                            ?>
                            <!-- <button>Download</button> -->
                        </table>
                    </div>
                </div>
            </div>

        </div>
        <div class="" id="activite">
            <div class="activities-wrapper">
                <div class="assignment activity-content">
                    <form action="" method="post" enctype="multipart/form-data">
                        <h2>Return Assignment</h2>
                        
                        <button name="upload-assignment">Upload</button>
                        <label for="file-upload" class="custom-file-upload">
                            Select a file
                        </label>
                        <input id="file-upload" type="file" name="assignmet-file" />
                    </form>
                    <p>Assessments are often critical, especially where compliance is concerned.</p>
                </div>
                <div class="test activity-content">
                    <h2>Check google classroom for upcoming tests</h2>
                </div>
            </div>
            <div class="image-part">
                <p>Given assignments</p>
                <div class="material assignmets">
                    <table>



                        <?php

                        $sql = "call uspViewAssigmnet('upload')";
                        $res = mysqli_query($connect, $sql);
                        while ($files = mysqli_fetch_assoc($res)) {
                            echo "<tr>";
                            echo "<td class='title'>" . $files['title'] . "</td";
                            echo "</tr>";
                            echo "<tr>";
                            echo "<td class='download-link'><a href='./student.php?assignment_id=" . $files['id'] . "'>Download</a></td>";
                            echo "</tr>";
                        }
                        ?>
                    </table>
                </div>
            </div>
        </div>
        <div class="" id="people">
            <div class="teacher-side">
                <h2>Course Name</h2>
                <div class="teachers">
                    <h2>Teachers</h2>
                    <hr>
                </div>
                <div class="list">
                    <div>
                        <img src="../sample.png">
                        <p>Simon Obrien</p>
                    </div>
                    <div>
                        <img src="../sample.png">
                        <p>Alyssa Watts</p>
                    </div>
                    <div>
                        <img src="../sample.png">
                        <p>Marcella Williamson</p>
                    </div>


                </div>
            </div>
            <div class="student-side">
                <div class="students">
                    <h2>Students</h2>
                    <hr>
                </div>
                <div class="list">
                    <div>
                        <img src="../sample.png">
                        <p>Erin Simon</p>
                    </div>
                    <div>
                        <img src="../sample.png">
                        <p>Brendan Mckinney</p>
                    </div>
                    <div>
                        <img src="../sample.png">
                        <p>Yvette Delgado</p>
                    </div>
                    <div>
                        <img src="../sample.png">
                        <p>Tricia Phelps</p>
                    </div>
                    <div>
                        <img src="../sample.png">
                        <p>Adam Collins</p>
                    </div>

                </div>
            </div>
        </div>
        <div class="" id="grade">
            <div class="student-side student-grade">
                <div class="students">
                    <h2>Students</h2>
                    <hr>
                </div>
                <div class="list">
                    <div>
                        <img src="../sample.png">
                        <p>Pam Knight</p>
                        <p>A</p>
                    </div>
                    <div>
                        <img src="../sample.png">
                        <p>Pat Crawford</p>
                        <p>C</p>
                    </div>
                    <div>
                        <img src="../sample.png">
                        <p>Darnell Todd</p>
                        <p>B</p>
                    </div>
                    <div>
                        <img src="../sample.png">
                        <p>Ida White</p>
                        <p>B</p>
                    </div>
                    <div>
                        <img src="../sample.png">
                        <p>Jeanette Barker</p>
                        <p>A</p>
                    </div>
                    <div>
                        <img src="../sample.png">
                        <p>Richard Powers</p>
                        <p>A</p>
                    </div>
                    <div>
                        <img src="../sample.png">
                        <p>Henry Bennett</p>
                        <p>C</p>
                    </div>
                    <div>
                        <img src="../sample.png">
                        <p>Jessie Holland</p>
                        <p>B+</p>
                    </div>
                </div>
            </div>
        </div>
        <?php

              include '../Footer/footer.php';

?>
    </div>
    <script src="../jquery.js"></script>
    <script src="./student.js"></script>
    <script src="vanillaEmojiPicker.js"></script>
    <script>
        new EmojiPicker({
            trigger: [{
                    selector: '.first-btn',
                    insertInto: ['.one', '.two'] // '.selector' can be used without array
                },
                {
                    selector: '.second-btn',
                    insertInto: '.two'
                }
            ],
            closeButton: true,
            //specialButtons: green
        });
    </script>
</body>

</html>