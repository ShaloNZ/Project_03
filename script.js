function Start_shopping() {
    window.location = "index.php";
}

function Gohome() {
    window.location = "index.php";
}

function Go_track_order() {
    window.location = "parcel_track.php";
}

function logo_run_animation() {
    setInterval(logo_animation, 3000);
}

function logo_animation() {

    document.getElementById("Main_div_item").classList.toggle("d-none");

}


function select_gender(id) {

    var gender_id = id;

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.readyState == 4) {
            document.getElementById("load_category_1").innerHTML = request.responseText;
            document.getElementById("load_category_2").innerHTML = "";
            // document.getElementById("header_alert").className = "d-none";
            document.getElementById("load_category_3").className = "d-block";
            document.getElementById("load_category_4").className = "d-none";
        }
    }

    request.open("GET", "load_category_1.php?id=" + gender_id, true);
    request.send();
}

function select_category_1(id) {

    var category_1 = id;

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.readyState == 4) {
            document.getElementById("load_category_2").innerHTML = request.responseText;
            document.getElementById("header_alert").className = "d-none";
        }
    }

    request.open("GET", "load_category_2.php?id=" + category_1, true);
    request.send();
}

function headerSearch() {
    var text = document.getElementById("text").value;

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.readyState == 4) {
            if (request.responseText == "error") {
                alert("Not Find Matching Products.!");
            } else if (request.responseText == "empty") {
                alert("Please Serach you want iteam.!");
            }
            else {
                document.getElementById("load_category_4").innerHTML = request.responseText;
            }
        }
    }

    request.open("GET", "headerSearchProcess.php?text=" + text, true);
    request.send();
}

function signUp() {

    var userName2 = document.getElementById("userName2").value;
    var email2 = document.getElementById("email2").value;
    var mobile2 = document.getElementById("mobile2").value;
    var password2 = document.getElementById("password2").value;
    var confirm_password2 = document.getElementById("confirm_password2").value;

    var form = new FormData();

    form.append("userName", userName2);
    form.append("email", email2);
    form.append("mobile", mobile2);
    form.append("password", password2);
    form.append("rpassword", confirm_password2);

    var requset = new XMLHttpRequest();

    requset.onreadystatechange = function () {
        if (requset.readyState == 4) {
            if (requset.responseText == "success") {
                window.location = "sign.php";
            } else {
                document.getElementById("signUpAlert").className = "d-block";
                document.getElementById("signUpAlert").className = "alert alert-danger";
                document.getElementById("signUpAlert").innerHTML = "!." + requset.responseText;
            }
        }
    }
    requset.open("POST", "signUpProcess.php", true);
    requset.send(form);

}

function signIn() {

    var email = document.getElementById("email").value;
    var password = document.getElementById("password").value;

    var form = new FormData();

    form.append("email", email);
    form.append("password", password);


    var requset = new XMLHttpRequest();

    requset.onreadystatechange = function () {
        if (requset.readyState == 4) {

            if (requset.responseText == "success") {
                window.location = "index.php";
            } else {
                document.getElementById("signInAlert").className = "d-block";
                document.getElementById("signInAlert").className = "alert alert-danger";
                document.getElementById("signInAlert").innerHTML = "!." + requset.responseText;
            }

        }
    }
    requset.open("POST", "signInProcess.php", true);
    requset.send(form);

}

function sign() {

    document.getElementById("signUpForm").classList.toggle("d-none");
    document.getElementById("signInForm").classList.toggle("d-none");

}

function signOut() {

    var requset = new XMLHttpRequest();

    requset.onreadystatechange = function () {
        if (requset.readyState == 4) {
            if (requset.responseText == "success") {
                window.location = "index.php";
            } else {
                alert(requset.responseText);
            }
        }
    }

    requset.open("GET", "signOutProcess.php", true);
    requset.send();

}

function set_gender() {

    var gender_selector = document.getElementById("gender_selector").value;

    var requset = new XMLHttpRequest();

    requset.onreadystatechange = function () {
        if (requset.readyState == 4) {
            document.getElementById("Category_1_slector").innerHTML = requset.responseText;

        }
    }

    requset.open("GET", "addNewProduct_select_Gender.php?id=" + gender_selector, true);
    requset.send();

}

function set_Category_2() {

    var Category_1_slector = document.getElementById("Category_1_slector").value;

    var requset = new XMLHttpRequest();

    requset.onreadystatechange = function () {
        if (requset.readyState == 4) {
            document.getElementById("Category_2_slector").innerHTML = requset.responseText;

        }
    }


    requset.open("GET", "addNewProduct_select_category_1.php?id=" + Category_1_slector, true);
    requset.send();

}

function Add_new_Color() {

    var add_new_color = document.getElementById("add_new_color").value;

    var requset = new XMLHttpRequest();

    requset.onreadystatechange = function () {
        if (requset.readyState == 4) {
            if (requset.responseText == "success") {
                location.reload();
            } else {
                document.getElementById("add_Product_Alert").className = "d-block";
                document.getElementById("add_Product_Alert").className = "alert alert-danger";
                document.getElementById("add_Product_Alert").innerHTML = requset.responseText;
            }
        }
    }

    requset.open("GET", "addNewProduct_Add_new_color.php?text=" + add_new_color, true);
    requset.send();

}

function Add_new_Brand() {

    var add_new_brand = document.getElementById("add_new_brand").value;

    var requset = new XMLHttpRequest();

    requset.onreadystatechange = function () {
        if (requset.readyState == 4) {
            if (requset.responseText == "success") {
                location.reload();
            } else {
                document.getElementById("add_Product_Alert").className = "d-block";
                document.getElementById("add_Product_Alert").className = "alert alert-danger";
                document.getElementById("add_Product_Alert").innerHTML = requset.responseText;
            }
        }
    }

    requset.open("GET", "addNewProduct_Add_new_brand.php?text=" + add_new_brand, true);
    requset.send();

}

function Add_new_Size() {

    var add_new_size = document.getElementById("add_new_size").value;

    var requset = new XMLHttpRequest();

    requset.onreadystatechange = function () {
        if (requset.readyState == 4) {
            if (requset.responseText == "success") {
                location.reload();
            } else {
                document.getElementById("add_Product_Alert").className = "d-block";
                document.getElementById("add_Product_Alert").className = "alert alert-danger";
                document.getElementById("add_Product_Alert").innerHTML = requset.responseText;
            }
        }
    }

    requset.open("GET", "addNewProduct_Add_new_size.php?text=" + add_new_size, true);
    requset.send();

}

function clearDate() {
    location.reload();
}

function Add_new_Product() {

    var title = document.getElementById("title").value;
    var brand_selector = document.getElementById("brand_selector").value;
    var Category_2_slector = document.getElementById("Category_2_slector").value;
    var color_selector = document.getElementById("color_selector").value;
    var size_selector = document.getElementById("size_selector").value;
    var qty = document.getElementById("qty").value;
    var price = document.getElementById("price").value;
    var description = document.getElementById("description").value;
    var image = document.getElementById("image");

    // alert(title);
    // alert(brand_selector);
    // alert(Category_2_slector);
    // alert(color_selector);
    // alert(size_selector);
    // alert(qty);
    // alert(price);
    // alert(description);
    // alert(image);

    var form = new FormData();

    var image_length = image.files.length;

    for (var x = 0; x < image_length; x++) {
        form.append("image" + [x], image.files[x]);
    }

    form.append("title", title);
    form.append("brand_selector", brand_selector);
    form.append("Category_2_slector", Category_2_slector);
    form.append("color_selector", color_selector);
    form.append("size_selector", size_selector);
    form.append("qty", qty);
    form.append("price", price);
    form.append("description", description);
    form.append("image", image);

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.readyState == 4) {
            if (request.responseText == "success") {
                location.reload();
                alert("Seccefully Add New Iteam");
            } else {
                alert(request.responseText);
            }
        }
    }

    request.open("POST", "addNewProductProcess.php", true);
    request.send(form);


}

function add_wish_list(id) {

    var p_id = id;

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.readyState == 4) {
            if (request.responseText == "login") {
                window.location = "sign.php";
                alert("Before Login or Sing Up");
            } else if (request.responseText == "error") {
                alert("Something went wrong")
            } else if (request.responseText == "success") {
                alert("Product was added to Wishlist successfully")
            } else {
                alert(request.responseText)
            }
        }
    }

    request.open("GET", "wish_list_add_products.php?id=" + p_id, true);
    request.send()

}

function remove_wish_list(id) {

    var p_id = id;

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.readyState == 4) {
            if (request.responseText == "login") {
                window.location = "sign.php";
                alert("Before Login or Sing Up");
            } else if (request.responseText == "error") {
                alert(request.responseText)
            } else if (request.responseText == "success") {
                location.reload();
            } else {
                alert(request.responseText)
            }
        }
    }

    request.open("GET", "wish_list_remove_products.php?id=" + p_id, true);
    request.send()

}

function add_cart_list(id) {

    var p_id = id;
    var color = document.getElementById("single_product_color").value;
    var size = document.getElementById("single_product_size").value;
    var qty = document.getElementById("single_product_qty").value;

    var form = new FormData();

    form.append("p_id", p_id);
    form.append("color", color);
    form.append("size", size);
    form.append("qty", qty);

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.readyState == 4) {
            if (request.responseText == "login") {
                window.location = "sign.php";
                alert("You have to Login First Before Add Iteam in your Cart");
            } else if (request.responseText == "success") {
                alert("Product was added to Cart successfully")
                alert(request.responseText)
            } else {
                alert(request.responseText)
            }
        }
    }

    request.open("POST", "cart_add_products.php.php", true);
    request.send(form)

}

function remove_cart_list(id) {

    var p_id = id;

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.readyState == 4) {
            if (request.responseText == "login") {
                window.location = "sign.php";
                alert("Before Login or Sing Up");
            } else if (request.responseText == "error") {
                alert(request.responseText)
            } else if (request.responseText == "success") {
                location.reload();
            } else {
                alert(request.responseText)
            }
        }
    }

    request.open("GET", "cart_remove_products.php?id=" + p_id, true);
    request.send()

}

function my_address() {

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.readyState == 4) {
            if (request.responseText == "login") {
                alert("You Have To Login First");
            } else {
                document.getElementById("user_profile_option_set").innerHTML = request.responseText;
            }
        }
    }

    request.open("GET", "user_profile_address_load.php", true);
    request.send()

}

function set_new_provinces() {

    var p_id = document.getElementById("id_set_new_provinces").value;

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.readyState == 4) {
            if (request.responseText == "error") {
                alert("Please Select Province");
            } else {
                document.getElementById("id_set_new_Distric").innerHTML = request.responseText;
            }
        }
    }

    request.open("GET", "user_profile_set_new_provinces.php?id=" + p_id, true);
    request.send()

}

function set_new_Distric() {

    var d_id = document.getElementById("id_set_new_Distric").value;

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.readyState == 4) {
            if (request.responseText == "error") {
                alert("Please Select Distric");
            } else {
                document.getElementById("id_set_new_City").innerHTML = request.responseText;
            }
        }
    }

    request.open("GET", "user_profile_set_new_district.php?id=" + d_id, true);
    request.send()

}

function clear_data() {
    location.reload();
}

function Set_user_Address() {

    var address_line_01 = document.getElementById("address_line_01").value;
    var address_line_02 = document.getElementById("address_line_02").value;
    var id_set_new_City = document.getElementById("id_set_new_City").value;
    var postal_code_address = document.getElementById("postal_code_address").value;
    var id_set_new_City_2 = document.getElementById("id_set_new_City_2").value;

    var form = new FormData();

    form.append("line_01", address_line_01)
    form.append("line_02", address_line_02)
    form.append("city", id_set_new_City)
    form.append("post_code", postal_code_address)
    form.append("city_2", id_set_new_City_2)

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.readyState == 4) {
            if (request.responseText == "success") {
                location.reload();
                alert("Succefully Update Address");
            } else {
                alert(request.responseText);
            }
        }
    }

    request.open("POST", "user_profile_address_set_process.php", true);
    request.send(form)

}

function Set_user_Address_first_time() {

    var address_line_01 = document.getElementById("address_line_01").value;
    var address_line_02 = document.getElementById("address_line_02").value;
    var id_set_new_City = document.getElementById("id_set_new_City").value;
    var postal_code_address = document.getElementById("postal_code_address").value;
    var id_set_new_City_2 = "text";

    var form = new FormData();

    form.append("line_01", address_line_01)
    form.append("line_02", address_line_02)
    form.append("city", id_set_new_City)
    form.append("post_code", postal_code_address)
    form.append("city_2", id_set_new_City_2)

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.readyState == 4) {
            if (request.responseText == "success") {
                location.reload();
                alert("Succefully Update Address");
            } else {
                alert(request.responseText);
            }
        }
    }

    request.open("POST", "user_profile_address_set_process.php", true);
    request.send(form)

}

function my_order() {

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.responseText == "login") {
            alert("You Have To Login First");
        } else {
            document.getElementById("user_profile_option_set").innerHTML = request.responseText;
        }
    }

    request.open("GET", "user_profile_order_load.php", true);
    request.send()

}

function my_profile() {

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        document.getElementById("user_profile_option_set").innerHTML = request.responseText;
    }

    request.open("GET", "user_profile_profile_load.php", true);
    request.send()

}

// function admin_manage_users() {

//     var request = new XMLHttpRequest();

//     request.onreadystatechange = function () {
//         document.getElementById("load_admin_option_div").innerHTML = request.responseText;
//     }

//     request.open("GET", "admin_profile_load_manage_users.php", true);
//     request.send()

// }

function admin_search_user() {

    var text = document.getElementById("admin_user_search_text").value;

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.responseText == "no") {
            alert("No matching Result");
        } else {
            document.getElementById("admin_search_user_load").innerHTML = request.responseText;
        }
    }

    request.open("GET", "admin_profile_search_user_process.php?id=" + text, true);
    request.send()


}

function admin__view_all_users() {

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.responseText == "no") {
            alert("No Users");
        } else {
            document.getElementById("admin_search_user_load").innerHTML = request.responseText;
        }
    }

    request.open("GET", "admin_profile_view_all_users.php", true);
    request.send()


}

// function admin_manage_products() {

//     var request = new XMLHttpRequest();

//     request.onreadystatechange = function () {
//         document.getElementById("load_admin_option_div").innerHTML = request.responseText;
//     }

//     request.open("GET", "admin_profile_load_manage_products.php", true);
//     request.send()

// }

function admin__view_all_products() {

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.responseText == "no") {
            alert("No Users");
        } else {
            document.getElementById("admin_search_products_load").innerHTML = request.responseText;
        }
    }

    request.open("GET", "admin_profile_view_all_products.php", true);
    request.send()


}

function admin_search_products() {

    var text = document.getElementById("admin_products_search_text").value;

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.responseText == "error") {
            alert("No matching Result");
        } else {
            document.getElementById("admin_search_products_load").innerHTML = request.responseText;
        }
    }

    request.open("GET", "headerSearchProcess.php?text=" + text, true);
    request.send()
        .php
}

function admin_profile_manage_user(id) {

    var user_id = id;

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.responseText == "error") {
            alert("No matching Result");
        } else {
            document.getElementById("admin_search_user_load").innerHTML = request.responseText;
        }
    }

    request.open("GET", "admin_profile_manage_user_process.php?id=" + user_id, true);
    request.send()

}

function admin_profile_manage_products(id) {

    var product_id = id;

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.responseText == "error") {
            alert("No matching Result");
        } else {
            document.getElementById("admin_search_products_load").innerHTML = request.responseText;
        }
    }

    request.open("GET", "admin_profile_manage_products_process.php?id=" + product_id, true);
    request.send()
}

function admin_update_products(id) {
    alert(id);
}

function admin_sign_in() {

    var userName = document.getElementById("userName").value;
    var email = document.getElementById("email").value;
    var mobile = document.getElementById("mobile").value;
    var password = document.getElementById("password").value;

    var form = new FormData();

    form.append("userName", userName);
    form.append("email", email);
    form.append("mobile", mobile);
    form.append("password", password);

    var requset = new XMLHttpRequest();

    requset.onreadystatechange = function () {
        if (requset.readyState == 4) {
            if (requset.responseText == "success") {
                location.reload();
            } else {
                document.getElementById("signUpAlert").className = "d-block";
                document.getElementById("signUpAlert").className = "alert alert-danger";
                document.getElementById("signUpAlert").innerHTML = requset.responseText;
            }
        }
    }
    requset.open("POST", "admin_profile_re_sign.php", true);
    requset.send(form);

}

function load_invoice(id) {

    var p_id = id;

    var requset = new XMLHttpRequest();

    requset.onreadystatechange = function () {
        if (requset.readyState == 4) {
            document.getElementById("user_profile_option_set").innerHTML = requset.responseText;
        }
    }
    requset.open("GET", "invoice.php?id=" + p_id, true);
    requset.send();

}

function buy_now(id) {

    var p_id = id;
    var color = document.getElementById("single_product_color").value;
    var size = document.getElementById("single_product_size").value;
    var qty = document.getElementById("single_product_qty").value;

    var form = new FormData();

    form.append("p_id", p_id);
    form.append("color", color);
    form.append("size", size);
    form.append("qty", qty);


    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.readyState == 4) {

            if (request.responseText == "setAddress") {
                alert("Please Set Delivery Address");
                window.location = "user_profile.php";

            } else if (request.responseText == "2") {
                alert("SomeThing Wrong");

            } else if (request.responseText == "3") {
                alert("Please Select Color !");

            } else if (request.responseText == "4") {
                alert("Please Select Size !");

            } else if (request.responseText == "5") {
                alert("Please Enter qty !");

            } else if (request.responseText == "6") {
                alert("Wrong Select qty !");

            } else if (request.responseText == "7") {
                alert("Wrong Select qty !");

            } else {

                var JsonObj = JSON.parse(request.responseText);

                // Payment completed. It can be a successful failure.
                payhere.onCompleted = function onCompleted(order_id) {

                    goToInvoice();

                    function goToInvoice() {

                        var order_id = JsonObj["order_id"];
                        var p_amount = JsonObj["amount"];
                        var p_qty = JsonObj["qty"];
                        var p_size = JsonObj["size"];
                        var p_color = JsonObj["color"];
                        var user_id = JsonObj["user_id"];

                        var form = new FormData();

                        form.append("user_id", user_id);
                        form.append("order_id", order_id);
                        form.append("p_id", p_id);
                        form.append("p_amount", p_amount);
                        form.append("p_qty", p_qty);
                        form.append("p_size", p_size);
                        form.append("p_color", p_color);

                        var request = new XMLHttpRequest();

                        request.onreadystatechange = function () {
                            if (request.readyState == 4) {
                                window.location = "invoice.php?id=" + request.responseText;
                            }
                        }

                        request.open("POST", "save_invoice_process.php", true);
                        request.send(form);
                    }

                    // Note: validate the payment and show success or failure page to the customer
                };

                // Payment window closed
                payhere.onDismissed = function onDismissed() {
                    // Note: Prompt user to pay again or show an error page
                    alert("Payment dismissed");
                    location.reload();
                };

                // Error occurred
                payhere.onError = function onError(error) {
                    // Note: show an error page
                    alert("Error:" + error);
                };

                // Put the payment variables here
                var payment = {
                    "sandbox": true,
                    "merchant_id": JsonObj["merchant_id"],    // Replace your Merchant ID
                    "return_url": "http://localhost/project14/invoice.php",
                    "cancel_url": "http://localhost/project14/single_product_view.php?id" + p_id,
                    "notify_url": "http://sample.com/notify",
                    "order_id": JsonObj["order_id"],
                    "items": JsonObj["item_name"],
                    "amount": JsonObj["amount"],
                    "currency": JsonObj["currency"],
                    "hash": JsonObj["hash"], // *Replace with generated hash retrieved from backend
                    "first_name": JsonObj["first_name"],
                    "last_name": JsonObj["last_name"],
                    "email": JsonObj["email"],
                    "phone": JsonObj["phone"],
                    "address": JsonObj["delivery_address_line_1"],
                    "city": JsonObj["delivery_city"],
                    "country": JsonObj["delivery_country"],
                    "delivery_address": JsonObj["delivery_address_line_1"],
                    "delivery_city": JsonObj["delivery_city"],
                    "delivery_country": JsonObj["delivery_country"],
                    "custom_1": "",
                    "custom_2": ""
                };

                // Show the payhere.js popup, when "PayHere Pay" is clicked
                document.getElementById('payhere-payment').onclick = function (e) {
                    payhere.startPayment(payment);
                };


            }

        }
    }

    request.open("POST", "Buy_Now_Process.php", true);
    request.send(form);

}

function change_user_dp() {

    var user_image = document.getElementById("user_image");

    var form = new FormData();
    form.append("image", user_image.files[0]);


    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.readyState == 4) {
            if (request.responseText == "success") {
                location.reload();
            } else {
                alert(request.responseText);
            }
        }
    }

    request.open("POST", "user_profile_change_dp.php", true);
    request.send(form);

}