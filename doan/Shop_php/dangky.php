<?php

// if(isset($_GET['btn-sign-up'])){

//     header("Location: index.php?page=sign-up");

// }

?>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous" />
<style>
   #content {
    /* background-image: url("b2.jpg");
    background-color: #cccccc;
    background-position: center; 
     background-repeat: no-repeat; 
     background-size: cover;  */
     background-color: #00fcd6; 
   background-image: linear-gradient(to right, #d6f9f9,#aaffaa, #aaffff  ,#d4aaff);
   }
   
  .form-group label {
    font-weight: 500;
  }

  .form-group.invalid .form-control {
    border-color: #f33a58;
  }

  .form-group.invalid .form-message {
    color: #f33a58;
    font-size: 17px;
  }

  .convert-sign-in a:hover {
    color: crimson;
    text-decoration: none;
  }

  #form-message-error {
    color: red;
    text-align: center;
    font-size: 23px;
    font-weight: 600;
    display: block;
  }

  #form-message-success {
    color: #3ae374;
    text-align: center;
    font-size: 23px;
    font-weight: 600;
    display: block;
  }

  .sub-form {
    position: relative;
  }

  .icon-eye {
    position: absolute;
    right: 20px;
    bottom: 6px;
    padding: 3px;
    z-index: 1;
  }

  .icon-eye:hover {
    cursor: pointer;
  }
</style>

<!-- 
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
 
</head> -->


<!-- end header -->
<div id="content" class="pt-5">
  <div class="container">
    <div class="row">
      <div class="col-md-8 m-auto">
        <h1 class="text-center">Đăng ký</h1>

        <form method = "post" name ="frmDangky" action="register.php" class="form" id="'registerForm"  >
        <div class="form-group form-group-name">
            <label for="name">Họ và tên</label>
            <input type="text" name="name" id="name" class="form-control" placeholder="Họ và tên" />
            <small class="form-message form-message-username">dcasd</small>
          </div>

          <div class="form-group form-group-username">
            <label for="username">Tên đăng nhập</label>
            <input type="text" name="username" id="username" class="form-control" placeholder="Tên đăng nhập" />
            <small class="form-message form-message-username"></small>
          </div>

          <div class="form-group form-group-password">
            <label for="password">Mật khẩu</label>
            <div class="sub-form">
              <input type="password" name="userPassword" id="userPassword" class="form-control" placeholder="" />
              <i class="fa-solid fa-eye icon-eye"></i>
            </div>
            <small class="form-message form-message-password"></small>
          </div>

          <div class="form-group form-group-email">
            <label for="email">Email</label>
            <input type="text" name="email" id="email" class="form-control" placeholder="Email" onblur = "validEmail()" />
            <small class="form-message form-message-email"></small>
          </div>

          <div class="form-group form-group-sex">
            <label for="gioiTinh">Giới tính:</label>
            <select name="gioiTinh" id="gioiTinh" required>
                <option value="Nam">Nam</option>
                <option value="Nữ">Nữ</option>
                <option value="Khác">Khác</option>
            </select><br><br>
            <small class="form-message form-message-sdt"></small>

          </div>
          
          <div class="form-group form-group-sdt">
            <label for="sdt">Số điện thoại</label>
            <input type="text" name="sdt" id="sdt" class="form-control" placeholder="Số điện thoại" />
            <small class="form-message form-message-sdt"></small>
          </div>

          <div class="form-group form-group-ngaysinh">
            <label for="ngaySinh">Ngày sinh:</label>
            <input type="date" name="ngaySinh" id="ngaySinh" required><br><br>
            <small class="form-message form-message-sdt"></small>
          </div>

          <div class="form-group form-group-diaChi">
            <label for="diaChi">Địa chỉ:</label><br>
            <select class="form-select form-select-sm mb-3" id="city" aria-label=".form-select-sm">
                <option value="" selected>Chọn tỉnh thành</option>
            </select>

            <select class="form-select form-select-sm mb-3" id="district" aria-label=".form-select-sm">
                <option value="" selected>Chọn quận huyện</option>
            </select>

            <select class="form-select form-select-sm" id="ward" aria-label=".form-select-sm">
                <option value="" selected>Chọn phường xã</option>
            </select><br><br>

            <textarea placeholder = "Nhập địa chỉ" name="diaChi" id="diaChi" rows="4" cols="30" required></textarea><br><br>
            <small class="form-message form-message-diaChi"></small>
          </div>
          
         
          <input type="submit" name="btn-sign-up" id="btn-sign-up" class="btn btn-info w-100 mt-4 mb-2" value="Đăng ký"></input>
          <small id="form-message-error"></small>
          <small id="form-message-success"></small>
          <div class="convert-sign-in mt-1">
            <span>Bạn đã có tài khoản?</span>
            <a href="dangnhap.php">Đăng nhập</a>
          </div>
        </form>

<!--         
<script>
  function validEmail() {

    var mailformat =/^((?:[A-Za-z!#$%&'*+\-\/=?^_`{|}~]|(?<=^|\.)"|"(?=$|\.|@)|(?<=".*)[ .](?=.*")|(?<!\.)\.){1,64})(@)((?:[A-Za-z0-9.\-])*(?:[A-Za-z0-9])\.(?:[A-Za-z0-9]){2,})$/i;
    if (mailformat.test(frmDangky.email.value)) {
        return true;  
    }
      alert ("Hãy nhập email hợp lệ!");
     return false;
}
</script>

 -->

<!-- 

<script>
    const nameEle = documnet.getElementById('name');
    const usernameEle = documnet.getElementById('username');
    const userPasswordEle = document.getElementById('userPassword');
    const emailEle = document.getElementById('email');
    const sdtEle = document.getElementById('sdt');

    
    const btnSignup = document.getElementById('btn-sign-up');
    const inputEles = document.querySelectorAll('.form-group');

    btnSignUp.addEventListener('click', function() {
      Array.from(inputEles).map((ele) =>
        ele.classList.remove('success', 'error')
      );
      let isValid = checkValidate();

      if(isValid) {
        alert('Đăng ký tài khoản thành công')
      }
    });

    function checkValidate() {
      let nameValue = nameEle.value;
      let usernameValue = usernameEle.value;
      let userPasswordValue = userPasswordEle.value;
      let emailValue = emailEle.value;
      let sdtValue = sdtEle.value;

      let isCheck == true;
      if (nameValue == '') {
        setError(nameEle, 'Tên không được bỏ trống');
        isCheck = false;
      } else {
        setSuccess(usernameEle);
      }

      if (usernameValue == '') {
        setError(usenameEle, 'Tên không được bỏ trống');
        isCheck = false;
      } else {
        setSuccess(usernameEle);
      }

       
    if (userPasswordValue == '') {
        setError(userPasswordEle, 'Mật khẩu không được để trống');
        isCheck = false;
    } else if (!isPassword(userPasswordValue)) {
        setError(emailEle, 'Email không đúng định dạng');
        isCheck = false;
    } else {
        setSuccess(userPasswordEle);
    }
      
    if (emailValue == '') {
        setError(emailEle, 'Email không được để trống');
        isCheck = false;
    } else if (!isEmail(emailValue)) {
        setError(emailEle, 'Email không đúng định dạng');
        isCheck = false;
    } else {
        setSuccess(emailEle);
    }

    
    if (sdtValue == '') {
        setError(sdtEle, 'Số điện thoại không được để trống');
        isCheck = false;
    } else if (!isPhone(sdtValue)) {
        setError(sdtEle, 'Số điện thoại không đúng định dạng');
        isCheck = false;
    } else {
        setSuccess(sdtEle);
    }

    return isCheck;

    }

    
function setSuccess(ele) {
    ele.parentNode.classList.add('success');
}

function setError(ele, message) {
    let parentEle = ele.parentNode;
    parentEle.classList.add('error');
    parentEle.querySelector('small').innerText = message;
}

function isEmail(email) {
    return /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(email);
}
 
function isPassword(password) {
    return /^[A-Za-z0-9_\.!@#$%^&*()]{5,32}$/.test(password);
}

function isPhone(number) {
    return /(84|0[3|5|7|8|9])+([0-9]{8})\b/.test(number);
}

</script> -->


        <script>
          var name = document.querySelector('#name');
          var username = document.querySelector('#username');
          var userPassword = document.querySelector('#userPassword');
          var email = document.querySelector('#email');
          var sdt = document.querySelector('#sdt');
          var diaChi = document.querySelector('#diaChi');

          function showError(input) {
            // let parent = input.parentElement;
            // console.log(parent);
            // let  small = parent.querySelector('small');

            // parent.classList.add('error');
            // small.innerText = message
              console.log(input.parentElement);
          }
          showError(name)


          // document.getElementById('registerForm').addEventListener('submit', function(e) {
          //   e.preventDefault(); // Ngăn chặn form submit mặc định



          //   // Lấy giá trị từ các trường select và textarea
          //   var city = document.getElementById('city').options[document.getElementById('city').selectedIndex].text;
          //   var district = document.getElementById('district').options[document.getElementById('district').selectedIndex].text;
          //   var ward = document.getElementById('ward').options[document.getElementById('ward').selectedIndex].text;
          //   var diaChi = document.getElementById('diaChi').value;

          //   // Ghép các giá trị lại thành một chuỗi
          //   var diaChiFull = city + ', ' + district + ', ' + ward + ', ' + diaChi;

          //   // Gán chuỗi địa chỉ vào trường input "diaChi"
          //   document.getElementById('diaChi').value = diaChiFull;

          //   // Tiếp tục submit form
          //   this.submit();
          //  });
       </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>

    <script>
        var citis = document.getElementById("city");
        var districts = document.getElementById("district");
        var wards = document.getElementById("ward");
        var Parameter = {
            url: "https://raw.githubusercontent.com/kenzouno1/DiaGioiHanhChinhVN/master/data.json",
            method: "GET",
            responseType: "application/json",
        };
        var promise = axios(Parameter);
        promise.then(function(result) {
            renderCity(result.data);
        });

        function renderCity(data) {
            for (const x of data) {
                citis.options[citis.options.length] = new Option(x.Name, x.Id);
            }
            citis.onchange = function() {
                district.length = 1;
                ward.length = 1;
                if (this.value != "") {
                    const result = data.filter(n => n.Id === this.value);

                    for (const k of result[0].Districts) {
                        district.options[district.options.length] = new Option(k.Name, k.Id);
                    }
                }
            };
            district.onchange = function() {
                ward.length = 1;
                const dataCity = data.filter((n) => n.Id === citis.value);
                if (this.value != "") {
                    const dataWards = dataCity[0].Districts.filter(n => n.Id === this.value)[0].Wards;

                    for (const w of dataWards) {
                        wards.options[wards.options.length] = new Option(w.Name, w.Id);
                    }
                }
            };
        }
    </script>

      </div>
    </div>
    
  </div>
</div>

