<?php
include "../../connection.php"; 
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="dafter.css">
  <script src="dafter.js"></script>
  <title>dafter</title>
</head>

<body>

  <div class="container">
    <div class="intro">
      <h3 style="font-weight: 100; text-align: center;">: (ة)انجاز الطالب</h3>
    </div>
    <form method="post" action="action.php">

      <div class="form first">
        <div class="slice">
          <h2 class="header">
            <button type="button" class="btn btn-warning" onclick="add_hifd()">اضافة+ </button> &nbsp &nbsp
            <button type="reset" class="btn btn-danger">حذف</button>&nbsp
            : بيانات الحفظ
          </h2>

          <div class="input-group" >


            <button style="background-color:red; font:size 24px; width:40px; height: 42px;;border-radius:5px;
          margin-top:30px;" onclick="remove_slice()"><i class="fa fa-trash-o"></i></button>



            <div class="input-field">
              <label> :العلامة </label>
              <select name="Mevaluation_mark">
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
                <option>6</option>
                <option>7</option>
                <option>8</option>
                <option>9</option>
                <option>10</option>
                <option>11</option>
                <option>12</option>
                <option>13</option>
                <option>14</option>
                <option>15</option>
                <option>16</option>
                <option>17</option>
                <option>18</option>
                <option>19</option>
                <option>20</option>
              </select>
            </div>
           
            <div class="input-field">
              <label> :الى اية</label>
              <select name="Mlastaya">
                <?php
                for ($y=1;$y<=286;$y++){
                  echo "<option value=".$y.">$y</option>";
              };
                //  if (isset($_POST["REQUEST_METHOD"])) {
                //   $selected_surah_id = $_POST["hifd_to_surah"];
                //   echo "<option >HI</option> ";
                // }
                //  else{
                //   echo "<option >hi</option> ";
                //  }
                ?>
              </select>
            </div>

            <div class="input-field">
              <label> :الى سورة</label>
              <select name='Msurah_id' id="">
              <?php
              $result = mysqli_query($database, "SELECT * FROM surah order by surah_id asc");
              $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
              foreach ($rows as $row) {
                $surah=$row["surah_name"];
                $id=$row["surah_id"];
                echo "<option  value=".$id.">$surah</option>";
            };
              
               ?>
              </select>

            </div>

            <div class="input-field">
              <label> :من اية</label>
              <select>
              <?php
                for ($y=1;$y<=286;$y++){
                  echo "<option value=".$y.">$y</option>";
              };?>
               
              </select>
            </div>
            <div class="input-field">
              <label> :من سورة</label>
              <select name="hifd_from_surah" id="">
              
              <?php
                $result = mysqli_query($database, "SELECT * FROM surah order by surah_id asc");
                $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
                foreach ($rows as $row) {
                $surah=$row["surah_name"];
                $id=$row["surah_id"];
                echo "<option value=".$id.">$surah</option>";
                };
              ?>
              </select>
            </div>



          </div>
          <div id="add_slice_hifd">
          <!-- add slice -->
          </div>
        </div>
        
        <div class="slice">
          <h2 class="header">
            <button type="button" class="btn btn-warning" onclick="add_morajaa()">اضافة+</button> &nbsp &nbsp
            <button type="reset" class="btn btn-danger">حذف</button>&nbsp
            : بيانات المراجعة 
          </h2>
          <div class="input-group" >
            <button style="background-color:red; font:size 24px; width:40px; height: 42px;;border-radius:5px;
          margin-top:30px;" onclick="remove_slice()"><i class="fa fa-trash-o"></i></button>


            <div class="input-field">
              <label> :العلامة </label>
              <select name="Revaluation_mark">

                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
                <option>6</option>
                <option>7</option>
                <option>8</option>
                <option>9</option>
                <option>10</option>
                <option>11</option>
                <option>12</option>
                <option>13</option>
                <option>14</option>
                <option>15</option>
                <option>16</option>
                <option>17</option>
                <option>18</option>
                <option>19</option>
                <option>20</option>
              </select>
            </div>

            <div class="input-field">
              <label> :الى اية</label>
              <select name="Rlastaya">
              <?php
                for ($y=1;$y<=286;$y++){
                  echo "<option value=".$y.">$y</option>";
              };
              ?>
              </select>
            </div>

            <div class="input-field">
              <label> :الى سورة</label>
              <select name="Rsurah_id" id=""></option>
              <?php
              $result = mysqli_query($database, "SELECT * FROM surah order by surah_id asc");
              $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
              foreach ($rows as $row) {
                $surah=$row["surah_name"];
                $id=$row["surah_id"];
                echo "<option value=".$id.">$surah</option>";
            };
              
               ?>
              </select>
            </div>

            <div class="input-field">
              <label> :من اية</label>

              <select>
              <?php
                for ($y=1;$y<=286;$y++){
                  echo "<option value=".$y.">$y</option>";
              };
              ?>
              </select>
            </div>
            <div class="input-field">
              <label> :من سورة</label>
              <select name="morajaa_from_surah" id="">
              <?php
              $result = mysqli_query($database, "SELECT * FROM surah order by surah_id asc");
              $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
              foreach ($rows as $row) {
                $surah=$row["surah_name"];
                $id=$row["surah_id"];
                echo "<option value=".$id.">$surah</option>";
            };
              
               ?>
              </select>
            </div>



          </div>
          <div id="add_slice_morajaa">
            <!-- add slice -->
          </div>
        </div>
       
          
        <!-- <div class="slice">
          <h2 class="header">
            : بيانات المواظبة </h2>
          <div class="input-group">
            <button style="background-color:red; font:size 24px; width:40px; height: 42px;;border-radius:5px;
            margin-top:30px;"><i class="fa fa-trash-o"></i></button>

            <div class="input-field2">

              <label> المواظبة</label>
              <select>
                <option> حاضر</option>
                <option> غائب</option>
                <option> متاخر</option>
                <option>غائب بعذر </option>
              </select>
            </div>

            <div class="input-field2">
              <label> ملاحظة الاستاذ </label>
              <input type="text" placeholder="">
              </select>
            </div>


          </div>
        </div> -->
        <button type="sumbit" class="btnText">حفظ التغييرات</button>
      </div>
         

    </form>
  </div>
 </body>

</html>

