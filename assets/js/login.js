function check_sign_up() {
    let check_error = false;
    //Tên
    let name = document.getElementById('name').value;
    if (name.length == 0) {
        check_error = true;
        document.getElementById('name_error').innerHTML = 'Không được để trống.';
    } else {
        let regex_name = /^[a-zA-ZÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂẾưăạảấầẩẫậắằẳẵặẹẻẽềềểếỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ\s]{2,}$/;
        if (!regex_name.test(name)) {
            document.getElementById('name_error').innerHTML = 'Tên không chứa kí tự đặc biệt.';
            check_error = true;
        } else {
            document.getElementById('name_error').innerHTML = '';
            check_error = false;
        }

    }
    //Email
    let email = document.getElementById('email').value;
    if (email.length == 0) {
        document.getElementById('email_error').innerHTML = 'Không được để trống.';
        check_error = true;
    } else {
        let regex_email = /^[\w\-]+@(?:[\w-]+)+(?:\.[\w-]{2,8}){1,5}$/;
        if (!regex_email.test(email)) {
            document.getElementById('email_error').innerHTML = 'Email không hợp lệ.';
            check_error = true;
        } else {
            document.getElementById('email_error').innerHTML = '';
            check_error = false;
        }
    }
    //Phone
    let phone = document.getElementById('phone').value;
    if (phone.length == 0) {
        document.getElementById('phone_error').innerHTML = 'Không được để trống.';
        check_error = true;
    } else {
        let regex_phone = /^(84|0[3|5|7|8|9])+([0-9]{8})$/;
        if (!regex_phone.test(phone)) {
            document.getElementById('phone_error').innerHTML = 'Số điện thoại không hợp lệ.';
            check_error = true;
        } else {
            document.getElementById('phone_error').innerHTML = '';
            check_error = false;
        }
    }
    //Mật khẩu
    let password = document.getElementById('password').value;
    if (password.length == 0) {
        document.getElementById('password_error').innerHTML = 'Không được để trống.';
        check_error = true;
    } else {
        let regex_password = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{6,}$/;
        if (!regex_password.test(password)) {
            document.getElementById('password_error').innerHTML = `Mật khẩu phải có ít nhất 6 kí tự, phải bao gồm chữ và số  `;
            check_error = true;
        }
        else {
            document.getElementById('password_error').innerHTML = '';
            check_error = false;
        }
    }
    //Nhập lại mật khẩu
    let repassword = document.getElementById('repassword').value;
    if (repassword.length == 0) {
        document.getElementById('repassword_error').innerHTML = 'Không được để trống.';
        check_error = true;
    } else {
        if (repassword != password) {
            document.getElementById('repassword_error').innerHTML = `Mật khẩu không khớp `;
            check_error = true;
        } else {
            document.getElementById('repassword_error').innerHTML = '';
            check_error = false;
        }
    }

    if (check_error) {
        return false;
    }
}

function check_sign_in() {
    let check_error = false;
    //Email
    let email = document.getElementById('email_sign_in').value;
    if (email.length == 0) {
        document.getElementById('email_error_sign_in').innerHTML = 'Không được để trống.';
        check_error = true;
    } else {
        let regex_email = /^[\w\-]+@(?:[\w-]+)+(?:\.[\w-]{2,8}){1,5}$/;
        if (!regex_email.test(email)) {
            document.getElementById('email_error_sign_in').innerHTML = 'Email không hợp lệ.';
            check_error = true;
        } else {
            document.getElementById('email_error_sign_in').innerHTML = '';
            check_error = false;
        }
    }
    if (check_error) {
        return false;
    }
}
