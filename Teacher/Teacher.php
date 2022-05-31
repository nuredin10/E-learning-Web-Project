<?php

include "../Footer/Header.php";
include '../config.php';
include '../Login-Signup/loginSignupQuery.php';

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


?>
<link rel="stylesheet" href="Teacher.css" />
<link rel="stylesheet" href="../Home-page/Home-page.css" />
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
        
        <li><button id="streamBth" value="stream">Stream</button></li>
        <li><button id="activitiesBtn" value="activitie">Activitie</button></li>
        <li><button id="peopleBtn" value="people">People</button></li>
        <li><button id="gradeBtn" value="grade">Grade</button></li>

      </ul>
    </div> -->
    <!-- <button id="messageBtn">Messages</b  utton> -->

    <div class="" id="stream">
      <div class="start-lecture">
        <div>
        <p>
          Join zoom and start the lecture
        </p>
        <!-- <input type="file" name="myfile"> -->

        <button class="start-lecture-btn">Start Lecture Now</button>
        <!-- <button id="messageBtn">Start Messaging</button> -->
        </div> 
      <!-- <div class="dropdown">
                    <button class="dropbtn">Select a Course</button>
                    <div class="dropdown-content">
                      <a href="#">Programming Skill</a>
                      <a href="#">Design</a>
                      <a href="#">Marketing</a>
                      <a href="#">Buisness</a>
                    </div>
                </div>
                     -->

        
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
        <form action="" method="post">
          <input type="text" name="search" id="search" placeholder="Type here to search">
          <input type="submit" value="search" id="submit-search" name="submit-search">
        </form>
        <div class="material-wrapper">

          <div class="material">

            <table>



              <?php
              // echo $currentUser;
              if (!isset($_POST['search'])) {
                // $download ="Download";
                $sql1 = "SELECT * FROM tblonlinematerials";
                $res = mysqli_query($connect, $sql1);
                while ($files = mysqli_fetch_assoc($res)) {
                  // $id = $files['id'];

                  echo "<tr class='tr'>";
                  echo "<td class='title'>" . $files['title'] . "</td>";
                  echo "</tr>";
                  echo "<tr>";
                  echo "<td class='download-link'><a href='./Teacher.php?file_id=" . $files['id'] . "'>Download</a></td>";
                  echo "</tr>";
                }
              }
              if (isset($_POST['submit-search'])) {
                $search = $_POST['search'];
                $sql = "SELECT * FROM tblonlinematerials WHERE title = '$search'";
                $result = mysqli_query($connect, $sql);
                while ($row = mysqli_fetch_assoc(($result))) {
                  echo "<tr >";
                  echo "<td class='title'>" . $row['title'] . "</td>";
                  echo "</tr>";
                  echo "<tr>";
                  echo "<td class='download-link'><a href='./Teacher.php?file_id=" . $row['id'] . "'>Download</a></td>";
                  echo "</tr>";
                }
              }
              ?>
              <!-- <button>Download</button> -->
            </table>
          </div>
        </div>
        <div class="share-material">
          <p>Share material</p>
          <form action="" method="post" enctype="multipart/form-data">
            <textarea name="material-title" id="material-title" placeholder="Title here"></textarea>
            <!-- <input classtype="file"> -->
            <input class="choose-file" type="file" name="file" id="asdmy_file">
            <button name="submit-material" class="share-material-button">Share Material</button>
          </form>
        </div>

      </div>
      </div>
      
      <!-- <div class="space">

      </div> -->
      
    </div>
    <div class="" id="activite">
      <div class="activities-wrapper">
        <div class="assignment activity-content">
          <form action="" method="post" enctype="multipart/form-data">
            <h2>Give Assignment</h2>
            <input type="text" name="assignment-title" class="assignment-title">
            
            <label for="file-upload" class="custom-file-upload">
              Select a file
            </label>
            <input id="file-upload" type="file" name="assignmet-file" />
            <button name="upload-assignment">Upload</button>
          </form>
        </div>
        <div class="test activity-content">
          <h2>GIve Test</h2>
          <p>Open google classroom and give test your to your students</p>
          <button id="open-classroom">Open classroom</button>
        </div>
      </div>
      <div class="image-part">

        <p>This assignment type asks students to submit text, using the normal Moodle editing tools.

Teachers can grade them online, and even add inline comments or changes. Online text assignments, together with Blogs, have replaced the non-standard Journal module.</p>
        <img src="../Home-page/home.png">
      </div>
    </div>
    <div class="" id="people">
      <div class="teacher-side">
        <!-- <h2>Course Name</h2> -->
        <div class="teachers">
          <h2>Teachers</h2>
          <hr />
        </div>
        <div class="list">
          <div>
            <img src="../sample.png" />
            <p>M.r Maiara Ojigkwanong</p>
          </div>
          <div>
            <img src="../sample.png" />
            <p>M.r Zechariah Christen</p>
          </div>
          <div>
            <img src="../sample.png" />
            <p>Mrs Vicki Marcia</p>
          </div>
        </div>
      </div>
      <div class="student-side">
        <div class="students">
          <h2>Students</h2>
          <hr />
        </div>
        <div class="list">
          <div>
            <img src="../sample.png" />
            <p>Ibbie Eleanore</p>
          </div>
          <div>
            <img src="../sample.png" />
            <p>Norbert Ebba</p>
          </div>
          <div>
            <img src="../sample.png" />
            <p>Lou Kelleigh</p>
          </div>
          <div>
            <img src="../sample.png" />
            <p>Brion Makayla</p>
          </div>
          <div>
            <img src="../sample.png" />
            <p>Lana Ira</p>
          </div>
        </div>
      </div>
    </div>
    <div class="" id="grade">
      <div class="student-side student-grade">
        <div class="students">
          <h2>Students</h2>
          <hr />
          <!-- <h2 class="select-grade">Select Grade</h2> -->
          <!-- <hr> -->
        </div>
        <div class="list">
          <div>
            <img src="../sample.png" />
            <p>Elijah Erickson</p>
            <select class="grade-dropdown">
              <option>B</option>
              <option>A</option>
              <option>B+</option>
              <option>B</option>
              <option>C+</option>
              <option>C</option>
              <option>D</option>
              <option>F</option>
            </select>
          </div>
          <div>
            <img src="../sample.png" />
            <p>Richard May</p>
            <select class="grade-dropdown">
              <option>A</option>
              <option>A</option>
              <option>B+</option>
              <option>B</option>
              <option>C+</option>
              <option>C</option>
              <option>D</option>
              <option>F</option>
            </select>
          </div>
          <div>
            <img src="../sample.png" />
            <p>Misty Cunningham</p>
            <select class="grade-dropdown">
              <option>A+</option>
              <option>A</option>
              <option>B+</option>
              <option>B</option>
              <option>C+</option>
              <option>C</option>
              <option>D</option>
              <option>F</option>
            </select>
          </div>
          <div>
            <img src="../sample.png" />
            <p>Joanna Kelly</p>
            <select class="grade-dropdown">
              <option>A</option>
              <option>A</option>
              <option>B+</option>
              <option>B</option>
              <option>C+</option>
              <option>C</option>
              <option>D</option>
              <option>F</option>
            </select>
          </div>
          <div>
            <img src="../sample.png" />
            <p>Wesley Lindsey</p>
            <select class="grade-dropdown">
              <option>C+</option>
              <option>A</option>
              <option>B+</option>
              <option>B</option>
              <option>C+</option>
              <option>C</option>
              <option>D</option>
              <option>F</option>
            </select>
          </div>
          <div>
            <img src="../sample.png" />
            <p>Gilberto Oliver</p>
            <select class="grade-dropdown">
              <option>B+</option>
              <option>A</option>
              <option>B+</option>
              <option>B</option>
              <option>C+</option>
              <option>C</option>
              <option>D</option>
              <option>F</option>
            </select>
          </div>
          <div>
            <img src="../sample.png" />
            <p>Bobbie Clayton</p>
            <select class="grade-dropdown">
              <option>B+</option>
              <option>A</option>
              <option>B+</option>
              <option>B</option>
              <option>C+</option>
              <option>C</option>
              <option>D</option>
              <option>F</option>
            </select>
          </div>
          <div>
            <img src="../sample.png" />
            <p>Nora Wilson</p>
            <select class="grade-dropdown">
              <option>B+</option>
              <option>A</option>
              <option>B+</option>
              <option>B</option>
              <option>C+</option>
              <option>C</option>
              <option>D</option>
              <option>F</option>
            </select>
          </div>
        </div>
      </div>
      <?php

              include '../Footer/footer.php';

?>
    </div>
  </div>
  <script src="../jquery.js"></script>
  <script src="./Teacher.js"></script>
  <script src="vanillaEmojiPicker.js"></script>
  <script>
    new EmojiPicker({
      trigger: [{
          selector: ".first-btn",
          insertInto: [".one", ".two"], // '.selector' can be used without array
        },
        {
          selector: ".second-btn",
          insertInto: ".two",
        },
      ],
      closeButton: true,
      //specialButtons: green
    });
  </script>
</body>

</html>

<?php


if (isset($_POST['submit-material'])) {
  $materialTitle = $_POST['material-title'];


  $pname = rand(1000, 10000) . "-" . $_FILES['file']['name'];

  $tname = $_FILES['file']['tmp_name'];

  $destination = "./uploaded_materials";



  // print_r( $_FILES);

  $ext = pathinfo($pname, PATHINFO_EXTENSION);

  move_uploaded_file($tname, $destination . '/' . $pname);

  if (!in_array($ext, ['.zip', '.pdf', '.doc', 'docx', 'ppt', 'pptx', 'png', 'jpg'])) {
    echo "forbiden extention type";
  } elseif ($_FILES['file']['size'] > 1000000000) {
    echo "file size too large";
  } else {

    $query = $db->prepare("INSERT INTO tblonlinematerials SET materials =?, type=?, title=?, courseID=?");
    $result = $query->execute([$pname, $ext, $materialTitle, "0"]);
    if ($result) {
      echo "file successfully uploaded";
    } else {
      echo "error";
    }
  }
}

if (isset($_POST['upload-assignment'])) {

  $uploadTitle = $_POST['assignment-title'];
  $pname = rand(1000, 10000) . "-" . $_FILES['assignmet-file']['name'];

  $tname = $_FILES['assignmet-file']['tmp_name'];

  $destination = './assignments';

  $ext = pathinfo($pname, PATHINFO_EXTENSION);
  // echo $pname.$tname.$destination.$ext;
  move_uploaded_file($tname, $destination . '/' . $pname);

  if (!in_array($ext, ['.zip', '.pdf', '.doc', 'docx', 'ppt', 'pptx', 'png', 'jpg'])) {
    echo "forbiden extention type";
  } elseif ($_FILES['assignmet-file']['size'] > 1000000000) {
    echo "file size too large";
  } else {

    $query = $db->prepare("call uspInsertAssignment(?,?,?,?,?)");
    $result = $query->execute([$pname, $ext, "upload", $uploadTitle, "asddcads"]);
    if ($result) {
      echo "file successfully uploaded";
    } else {
      echo "error";
    }
  }
}






?>