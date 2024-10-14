function signUp(){

    var fn = document.getElementById("fname");
    var ln = document.getElementById("lname");
    var e = document.getElementById("email");
    var pw = document.getElementById("password");
    var cpw = document.getElementById("cpassword");
    var c = document.getElementById("country");
    var m = document.getElementById("mobile");
    var c_code = document.getElementById("cc");

    var fnValue = fn.value.trim();
    var lnValue = ln.value.trim();
    var eValue = e.value.trim();
    var pwValue = pw.value.trim();
    var cpwValue = cpw.value.trim();
    var countryValue = country.value.trim();

    // Remove previous warning messages
    document.getElementById("fnamemsg").innerHTML = "";
    document.getElementById("lnamemsg").innerHTML = "";
    document.getElementById("emailmsg").innerHTML = "";
    document.getElementById("pwmsg").innerHTML = "";
    document.getElementById("cpwmsg").innerHTML = "";
    document.getElementById("countrymsg").innerHTML = "";

    // Check if fields are not empty
    var isValid = true;
    if (fnValue === "") {
        document.getElementById("fnamemsg").innerHTML = "First name is required.";
        isValid = false;
    }
    if (lnValue === "") {
        document.getElementById("lnamemsg").innerHTML = "Last name is required.";
        isValid = false;
    }
    if (eValue === "") {
        document.getElementById("emailmsg").innerHTML = "Email is required.";
        isValid = false;
    }
    if (pwValue === "") {
        document.getElementById("pwmsg").innerHTML = "Password is required.";
        isValid = false;
    }
    if (cpwValue === "") {
        document.getElementById("cpwmsg").innerHTML = "Confirm your password.";
        isValid = false;
    }
    if (pwValue !== cpwValue) {
        document.getElementById("cpwmsg").innerHTML = "Password Doesn't match.";
        isValid = false;
    }
    if (countryValue === "") {
        document.getElementById("countrymsg").innerHTML = "Select Your Country.";
        isValid = false;
    }
    if (!isValid) {
        // If any field is empty, return without sending the request
        return;
    }

    var f = new FormData();
    f.append("fname",fn.value);
    f.append("lname",ln.value);
    f.append("email",e.value);
    f.append("password",pw.value);
    f.append("cpassword",cpw.value);
    f.append("country",c.value);
    f.append("mobile",m.value);
    f.append("cc",c_code.value);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4 && r.status == 200) {
            var t = r.responseText;

            if (t == "success") {
                window.location = "signin.php";
            } else {
                // Handle the response as needed
                // alert(t);
                swal("", t, "");

            }
        }
    }

    r.open("POST","signUpProcess.php",true);
    r.send(f);
}


function signin(){
    
    var email = document.getElementById("email");
    var password = document.getElementById("password");
    var rememberme = document.getElementById("rememberme");
    var m = document.getElementById("hm");
    var bm;

    var f = new FormData();
    f.append("e",email.value);
    f.append("p",password.value);
    f.append("rm",rememberme.checked);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function(){
        if(r.readyState == 4 && r.status == 200){
            var response = r.responseText;

            if(response == "success"){

                window.location = "index.php";

                window.location.href + "http://localhost/shopplyown/index.php";

            }else{
                swal("", response, "");
                //alert(response);
            }
        }
    }

    r.open("POST","signInProcess.php",true);
    r.send(f);
}

function adminsignin(){
    
    var adminmail = document.getElementById("ademail");
    var adminpass = document.getElementById("adpassword");
    var rememberme = document.getElementById("rememberme");

    var f = new FormData();
    f.append("ae",adminmail.value);
    f.append("ap",adminpass.value);
    f.append("arm",rememberme.checked)

    var r = new XMLHttpRequest();

    r.onreadystatechange = function(){
        if(r.readyState == 4 && r.status == 200){
            var response = r.responseText;

            if(response == "success"){

                window.location = "adminpanel.php";

            }else{
                // alert(response);
                swal("", response, "");
                // swal("Please Re-enter your E-mail and Password");
            }
        }
    }

    r.open("POST","adminsigninprocess.php",true);
    r.send(f);

}


function forgotpassword(){
    
    var email = document.getElementById("email");

    var r = new XMLHttpRequest();

    r.onreadystatechange = function(){
        if(r.readyState == 4 && r.status == 200){
            var t = r.responseText;

            if(t == "success"){

                var signInBox = document.getElementById("signinbox");
                var resetpassword = document.getElementById("restpasswordbox");
            
                signInBox.classList.toggle("d-none");
                resetpassword.classList.toggle("d-none");

            }else{
                // alert(t);
                swal("", t, "");

            }
        }
    }

    r.open("GET","forgotPasswordProcess.php?e="+email.value,true);
    r.send();

}

function showPassword(){

    var np = document.getElementById("npass");
    var npb = document.getElementById("npassb");

    if(np.type == "password"){
        np.type = "text";
        npb.innerHTML = '<i class="bi bi-eye-slash-fill"></i>';
    }else{
        np.type = "password";
        npb.innerHTML = '<i class="bi bi-eye"></i>';
    }
}

function showPassword1(){

    var np = document.getElementById("cnpass");
    var npb = document.getElementById("cnpassb");

    if(np.type == "password"){
        np.type = "text";
        npb.innerHTML = '<i class="bi bi-eye-slash-fill"></i>';
    }else{
        np.type = "password";
        npb.innerHTML = '<i class="bi bi-eye"></i>';
    }
}

function resetpassword(){

    var email = document.getElementById("email")
    var verificationcode = document.getElementById("verifycode");
    var newpass = document.getElementById("npass");
    var cnewpass = document.getElementById("cnpass");

    var f = new FormData();
    f.append("e",email.value);
    f.append("vc",verificationcode.value);
    f.append("np",newpass.value);
    f.append("cnp",cnewpass.value);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function(){
        if(r.readyState == 4 && r.status == 200){
            var t = r.responseText;

            if(t == "success"){

                window.location = "signin.php";

            }else{
                // alert(t);
                swal("", t, "");

            }
        
        }
    }
    r.open("POST","resetPasswordProcess.php",true);
    r.send(f);

}

var cards = document.querySelectorAll('.product-box');

[...cards].forEach((card)=>{
    card.addEventListener('mouseover',function(){
        card.classList.add('is-hover');
    })
    card.addEventListener('mouseleave',function(){
        card.classList.remove('is-hover');
    })
})


function loadCountrycode(){

    var country = document.getElementById("country").value;

    var r = new XMLHttpRequest();

    r.onreadystatechange = function(){
        if(r.status == 200 && r.readyState == 4){
            var t = r.responseText;

            document.getElementById("cc").innerHTML = t;

        }else{

        }
    }

    r.open("GET","loadCcodeProcess.php?c=" + country,true);
    r.send();

}

function updateProfile(){
    var profile_image = document.getElementById("profileImage");
    var profile_image2 = document.getElementById("profileImage2");
    var first_name = document.getElementById("fname");
    var last_name = document.getElementById("lname");
    var pw = document.getElementById("password");
    var cpw = document.getElementById("cpassword");
    var abtu = document.getElementById("bio");
    var mobile = document.getElementById("mobile");
    var address_line = document.getElementById("address");
    var g = document.getElementById("gender");
    var postal = document.getElementById("p_code");
    var fb = document.getElementById("fblink");
    var ig = document.getElementById("iglink");

    var f = new FormData();

    f.append("img",profile_image.files[0]);
    f.append("img2",profile_image2.files[0]);
    f.append("fn",first_name.value);
    f.append("ln",last_name.value);
    f.append("password",pw.value);
    f.append("cpass",cpw.value);
    f.append("about",abtu.value);
    f.append("m",mobile.value);
    f.append("address",address_line.value);
    f.append("gender",g.value);
    f.append("postal_code",postal.value);
    f.append("fblink",fb.value);
    f.append("iglink",ig.value);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function(){
        if(r.status == 200 && r.readyState == 4){
            var t = r.responseText;

            if(t == "success"){

                window.location = "signin.php";
    
                // swal("", t, "success");
            }else{
                // alert(t);
                swal("", t, "error");

            }
        }
    }
    r.open("POST","userProfileUpdateProcess.php",true);
    r.send(f);
}

function loadBrands(){

    var category = document.getElementById("procat").value;

    var r = new XMLHttpRequest();

    r.onreadystatechange = function (){
        if(r.status == 200 && r.readyState == 4){
            var t = r.responseText;

            document.getElementById("probrand").innerHTML = t;
            
        }
    }

    r.open("GET","loadBrandProcess.php?cat=" + category,true);
    r.send();
}

function loadModels(){
    var brand = document.getElementById("probrand").value;

    var r = new XMLHttpRequest();

    r.onreadystatechange = function (){
        if(r.status == 200 && r.readyState == 4){
            var t = r.responseText;

            document.getElementById("promodel").innerHTML = t;
            
        }
    }

    r.open("GET","loadModelProcess.php?b=" + brand,true);
    r.send();
}

function changeProductImage(){

    var images = document.getElementById("imageuploader");

    images.onchange = function(){

        var file_count = images.files.length;

        if(file_count <= 4){

            for(var x = 0;x < file_count; x++){
                var file = this.files[x];
                var url = window.URL.createObjectURL(file);
                document.getElementById("i" + x).src = url;
            }

        }else{
            alert(file_count + "files uploaded. You are proceed to upload 04 or less than 04 files.");
            //swal("Please Re-enter your E-mail and Password");
        }

    }

}

function addProduct(){
    
    var category = document.getElementById("procat");
    var brand = document.getElementById("probrand");
    var model = document.getElementById("promodel");
    var title = document.getElementById("proname");

    var condition = 0;
    if(document.getElementById("b").checked){
        condition = 1;
    }else if(document.getElementById("u").checked){
        condition = 2;
    }

    var clr = document.getElementById("clr");
    var qty = document.getElementById("qty");
    var dimension = document.getElementById("prodimension");
    var selltype = document.getElementById("sellformat");
    var shipping = document.getElementById("ship");
    var shippingcost = document.getElementById("shipcost");
    var cost = document.getElementById("cost");
    var desc = document.getElementById("prodesc");
    var image = document.getElementById("imageuploader");

    var costpayment = 0;
    if(document.getElementById("ip").checked){
        costpayment = 1;
    }else if(document.getElementById("cod").checked){
        costpayment = 2;
    }

    var f = new FormData();

    f.append("ca",category.value);
    f.append("br",brand.value);
    f.append("m",model.value);
    f.append("t",title.value);
    f.append("con",condition);
    f.append("clr",clr.value);
    f.append("q",qty.value);
    f.append("dim",dimension.value);
    f.append("st",selltype.value);
    f.append("ship",shipping.value);
    f.append("shipc",shippingcost.value);
    f.append("cost",cost.value);
    f.append("desc",desc.value);
    f.append("cp",costpayment);

    var file_count = image.files.length;
    for(var x = 0;x < file_count; x++){
        f.append("img" + x,image.files[x]);
    }

    var r = new XMLHttpRequest();

    r.onreadystatechange = function(){
        if(r.status == 200 && r.readyState == 4){
            var t = r.responseText;

            if (t == "success") {
                window.location = "myProducts.php";
            } else {
                // alert(t);
                // swal("", t, "error");
                location.reload();
                
            }
            
        }
    }


    r.open("POST","addProductProcess.php",true);
    r.send(f);
}

function changeStatus(product_id) {

    var product_id = product_id;
    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.status == 200 && r.readyState == 4) {
            var t = r.responseText;
            if (t == "activated" || t == "deactivated") {
                window.location.reload();
                // swal("", t, "success");

            } else {
                // alert(t);
                swal("", t, "error");

            }
        }
    }

    r.open("GET", "changeStatusProcess.php?p=" + product_id, true);
    r.send();

}

function changeUserStatus(email){
    //alert ("Ok");

    var email = email;
    var r = new XMLHttpRequest();

    r.onreadystatechange = function(){
        if(r.status == 200 && r.readyState == 4 ){
            var t = this.responseText;

            if (t == "activated" || t == "deactivated") {
                window.location.reload();
                // swal("", t, "success");

            } else {
                //alert(t);
                swal("", t, "error");
                
            }
        }
    }

    r.open("GET","changeUserStatusProcess.php?email=" + email, true);
    r.send();

}

function sendId(product_id) {

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.status == 200 && r.readyState == 4) {
            var t = r.responseText;

            if(t == "success"){
                window.location = "updateProduct.php";
            }else{
                // alert(t);
                swal("", t, "error");

            }
        }
    }

    r.open("GET", "sendIdProcess.php?id=" + product_id, true);
    r.send();

}



function updateProduct(){

    var title = document.getElementById("proname");
    var desc = document.getElementById("prodesc");
    var quantity = document.getElementById("qty");
    var sc = document.getElementById("shipcost");
    var price = document.getElementById("cost");
    var img = document.getElementById("imageuploader");

    //alert(title.value);
    //alert(desc.value);
    //alert(quantity.value);
    //alert(sc.value);
    //alert(price.value);
    

    var f = new FormData();

    f.append("t",title.value);
    f.append("description",desc.value);
    f.append("qty",quantity.value);
    f.append("shipping",sc.value);
    f.append("cost",price.value);

    var file_count = img.files.length;
    for (var x = 0; x < file_count; x++) {
        f.append("i" + x, img.files[x]);
    }

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.status == 200 && r.readyState == 4) {
            var t = r.responseText;

            alert(t);
        }
    }

    r.open("POST", "updateProductProcess.php", true);
    r.send(f);

}

function addToWatchlist(id){
    
    var r = new XMLHttpRequest();

    r.onreadystatechange = function(){
        if(r.status == 200 && r.readyState == 4){
            var t = r.responseText;
            
            if(t == "Product added to the watchlist successfully."){

                swal("", t, "success");

            }else if(t == "Product removed from watchlist successfully."){

                swal("", t, "success");

            }else{
                // alert(t);
                swal("", t, "error");
            }
        }
    }

    r.open("GET","addWatchListProcess.php?id="+id,true);
    r.send();

}

function addToCart(id){
    
    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.status == 200 && r.readyState == 4) {
            var t = r.responseText;
            if (t == "This Product Already Exists In The Cart") {

                swal("", t, "warning");

                //alert("This Product Already Exists In The Cart");

            } else if (t == "Product Added to the Cart") {

                swal("", t, "success");

                //alert("Product Added");

            } else {

                // alert(t);
                swal("", t, "error");
            }
        }
    }

    r.open("GET", "addToCartProcess.php?id=" + id, true);
    r.send();

}

function removeFromCart(id) {

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.status == 200 && r.readyState == 4) {
            var t = r.responseText;
            if (t == "deleted") {
                window.location.reload();
            } else {
                // alert(t);
                swal("", t, "error");

            }
        }
    }

    r.open("GET", "removeFromCartProcess.php?id=" + id, true);
    r.send();

}

function removeFromWatchlist(id){
    var r = new XMLHttpRequest();

    r.onreadystatechange = function(){
        if(r.status == 200 && r.readyState == 4){
            var t = r.responseText;
            if(t == "Deleted"){
                window.location.reload();
            }else{
                // alert(t);
                swal("", t, "error");

            }
            
            
        }
    }

    r.open("GET","removeFromWatchListProcess.php?id="+id,true);
    r.send();
}

function changeView(){
    
    var descbox = document.getElementById("descriptionbox");
    var rvbox = document.getElementById("reviewbox");

    descbox.classList.toggle("d-none");
    rvbox.classList.toggle("d-none");

}


function signout(){
    var r = new XMLHttpRequest();

    r.onreadystatechange = function(){
        if(r.readyState == 4 && r.status == 200){
            var t = r.responseText;
           
            if(t == "success"){
                window.location = "signin.php";
            }else{
                // alert(t);
                swal("", t, "error");

            }
        }
    }

    r.open("GET","signoutProcess.php",true);
    r.send();
}

function sort(x) {
    var search = document.getElementById("search");
    var time = "0";
    if (document.getElementById("new").checked) {
        time = "1";
    } else if (document.getElementById("old").checked) {
        time = "2";
    }
    var qty = "0";
    if (document.getElementById("high").checked) {
        qty = "1";
    } else if (document.getElementById("low").checked) {
        qty = "2";
    }
    var condition = "0";
    if (document.getElementById("brand").checked) {
        condition = "1";
    } else if (document.getElementById("used").checked) {
        condition = "2";
    }
    var bf = "0";
    if (document.getElementById("bn").checked) {
        bf = "1";
    } else if (document.getElementById("au").checked) {
        bf = "2";
    } else if (document.getElementById("ex").checked) {
        bf = "3";
    }
    var minc = document.getElementById("mincost");
    var maxc = document.getElementById("maxcost");
    var f = new FormData();
    f.append("s", search.value);
    f.append("t", time);
    f.append("q", qty);
    f.append("c", condition);
    f.append("buyingf", bf);
    f.append("lowprice", minc.value);
    f.append("highprice", maxc.value);
    f.append("page", x);
    var r = new XMLHttpRequest();
    r.onreadystatechange = function () {
        if (r.status == 200 && r.readyState == 4) {
            var t = r.responseText;
            document.getElementById("sort").innerHTML = t;
        }
    }
    r.open("POST", "sortProcess.php", true);
    r.send(f);
}

function clearSort() {
    window.location.reload();
}

function qty_inc(qty) {

    var input = document.getElementById("qty_input");

    if (input.value < qty) {

        var new_value = parseInt(input.value) + 1;
        input.value = new_value;

    } else {

        // alert("You have reched to the Maximum");
        swal("", "You have reched to the Maximum", "warning");

        input.value = qty;

    }

}

function qty_dec() {
    var input = document.getElementById("qty_input");

    if (input.value > 1) {

        var new_value = parseInt(input.value) - 1;
        input.value = new_value;

    } else {

        // alert("You have reched to the Minimum");
        swal("", "You have reched to the Minimum", "error");

        input.value = 1;

    }
}

function check_value(qty) {

    var input = document.getElementById("qty_input");

    if (input.value < 1) {
        alert("You must add 1 or more");
        input.value = 1;
    } else if (input.value > qty) {
        alert("Insufficient quantity");
        input.value = qty;
    }

}

// function buynow(pid){
    
//     var qty = document.getElementById("qty_input").value;

//     var r = new XMLHttpRequest();

//     r.onreadystatechange = function () {
//         if (r.readyState == 4 && r.status == 200) {
//             var t = r.responseText;

//             //alert(t);

//            var obj = JSON.parse(t);

//         if (t == "address error, Please Update your User Profile !") {
//             //alert("Please Update Your Profile.");
//             window.location = "userprofile.php";
//         } else {

//             // Payment completed. It can be a successful failure.
//             payhere.onCompleted = function onCompleted(orderId) {
//             console.log("Payment completed.OrderID:" + orderId);
//             //saveInvoice(orderId, amount, qty, id, email);

//             //window.location = "addinvoice.php?id="+orderId;

//             saveInvoice (orderId, pid,obj["email"], obj["amount"], qty);

//         // Note: validate the payment and show success or failure page to the customer
//     };

//     // Payment window closed
//     payhere.onDismissed = function onDismissed() {
//         // Note: Prompt user to pay again or show an error page
//         console.log("Payment dismissed");
//     };

//     // Error occurred
//     payhere.onError = function onError(error) {
//         // Note: show an error page
//         console.log("Error:"  + error);
//     };

//     // Put the payment variables here
//     var payment = {
//         "sandbox": true,
//         "merchant_id": "1224190 ",    // Replace your Merchant ID
//         "return_url": "http://localhost/shopplyown/singleProductView.php?id=" + pid,     // Important
//         "cancel_url": "http://localhost/shopplyown/singleProductView.php?id=" + pid,     // Important
//         "notify_url": "http://sample.com/notify",
//         "order_id": obj["order_id"],
//         "items": obj["items"],
//         "amount": obj["amount"],
//         "currency": obj["currency"],
//         "hash": obj["hash"], // *Replace with generated hash retrieved from backend
//         "first_name": obj["first_name"],
//         "last_name": obj["last_name"],
//         "email": obj["email"],
//         "phone": obj["phone"],
//         "address": obj["address"],
//         "city": obj["city"],
//         "country": obj["country"],
//         "delivery_address": obj["delivery_address"],
//         "delivery_city": obj["delivery_city"],
//         "delivery_country": obj["delivery_country"],
//         "custom_1": "",
//         "custom_2": ""
//     };

//     payhere.startPayment(payment);

//     }

//         }
//     }

//     r.open("GET","process.php?id=" + pid + "&qty=" + qty, true);
//     r.send();
// }

function saveInvoice (orderId, pid, email, amount, qty){

    var order_id = orderId;
    var p_id = pid;
    var mail = email;
    var total = amount;
    var pqty = qty;

    // alert(order_id);
    // alert(p_id);
    // alert(mail);
    // alert(total);
    // alert(pqty);
    
    var f = new FormData();
    f.append("o",order_id);
    f.append("i",p_id);
    f.append("m",mail);
    f.append("a",total);
    f.append("q",pqty);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function (){
        if(r.readyState == 4){
            var t = r.responseText;

            alert(t);

            if(t == "success"){

                //alert (t);
                // window.location = "invoice.php?id="+orderId;

            }else{
                alert (t);
            }

        }
    }

    r.open("POST","saveInvoice.php",true);
    r.send(f);

}

function printInvoice(){
    
    var restorepage = document.body.innerHTML;
    var page = document.getElementById("invoice").innerHTML;
    document.body.innerHTML = page;
    window.print();
    document.body.innerHTML = restorepage;

}

function printreport(){
    var restorepage = document.body.innerHTML;
    var page = document.getElementById("printr").innerHTML;
    //var page1 = document.getElementById("usersr").innerHTML;
    document.body.innerHTML = page;
    //document.body.innerHTML = page1;
    window.print();
    document.body.innerHTML = restorepage;
}


function basicSearch(x){
    
    var page = x;
    var search = document.getElementById("search");

    var f = new FormData();
    f.append("se",search.value);
    f.append("pg", page);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function(){
        if(r.readyState == 4 && r.status == 200){
            var response = r.responseText
            // alert (response);
            document.getElementById("basicSearchResult").innerHTML = response;
        }
    }

    r.open("POST","basicSearchProcesss.php",true);
    r.send(f);
}



function loadBrands2(){

    var category = document.getElementById("c1").value;

    var r = new XMLHttpRequest();

    r.onreadystatechange = function (){
        if(r.status == 200 && r.readyState == 4){
            var t = r.responseText;

            document.getElementById("b1").innerHTML = t;
            
        }
    }

    r.open("GET","loadBrandProcess.php?cat=" + category,true);
    r.send();
}

function loadModels2(){
    var brand = document.getElementById("b1").value;

    var r = new XMLHttpRequest();

    r.onreadystatechange = function (){
        if(r.status == 200 && r.readyState == 4){
            var t = r.responseText;

            document.getElementById("m").innerHTML = t;
            
        }
    }

    r.open("GET","loadModelProcess.php?b=" + brand,true);
    r.send();
}

function advancedSearch(x){

    var txt = document.getElementById("t");
    var category = document.getElementById("c1");
    var brand = document.getElementById("b1");
    var model = document.getElementById("m");
    var condition = document.getElementById("c2");
    var from = document.getElementById("pf");
    var to = document.getElementById("pt");
    var sort = document.getElementById("s");

    var f = new FormData();

    f.append("t",txt.value);
    f.append("cat",category.value);
    f.append("b",brand.value);
    f.append("mo",model.value);
    f.append("con",condition.value);
    f.append("pf",from.value);
    f.append("pt",to.value);
    f.append("s",sort.value);
    f.append("page",x);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function (){
        if(r.status == 200 && r.readyState == 4){
            var t = r.responseText;
            document.getElementById("view_area").innerHTML = t;
        }
    }

    r.open("POST","advancedSearchProcess.php",true);
    r.send(f);

}

function viewMessages(email){
    var r = new XMLHttpRequest();

    r.onreadystatechange = function (){
        if(r.readyState == 4){
            var t = r.responseText;
            document.getElementById("chat_box").innerHTML = t;
        }
    }
    
    r.open("GET","viewMsgProcess.php?e="+email,true);
    r.send();
}

function send_msg(){

    var recevr_mail = document.getElementById("rmail");
    var msg_txt = document.getElementById("msg_txt");

    var f = new FormData();
    f.append("rm",recevr_mail.innerHTML);
    f.append("mt",msg_txt.value);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function (){
        if(r.readyState == 4){
            var t = r.responseText;
            if(t == "success"){
                document.getElementById("chat_box").reload();
            }else{
                // alert (t);
                swal("", t, "error");
                
            }
        }
    }

    r.open("POST","sendMsgProcess.php",true);
    r.send(f);

}

function ncat() {
    //alert("Ok");

    var nc = document.getElementById("newcat");

    //alert(nc.value);

    var f = new FormData();
    f.append("newcat",nc.value);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function(){
        if(r.status == 200 && r.readyState == 4){
            var t = r.responseText;

            // alert(t);
            swal("", t, "success");

        }
    }

    r.open("POST","addcatprocess.php",true);
    r.send(f);
}

function nbrand(){
    // alert("Ok");

    var nb = document.getElementById("newbarnd");

    //alert(nc.value);

    var f = new FormData();
    f.append("newbarnd",nb.value);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function(){
        if(r.status == 200 && r.readyState == 4){
            var t = r.responseText;

            // alert(t);
            swal("", t, "success");

        }
    }

    r.open("POST","addbrandprocess.php",true);
    r.send(f);

}

function nmodel(){
    // alert("Ok");

    var nm = document.getElementById("newmodel");

    //alert(nc.value);

    var f = new FormData();
    f.append("newmodel",nm.value);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function(){
        if(r.status == 200 && r.readyState == 4){
            var t = r.responseText;

            // alert(t);
            swal("", t, "success");

        }
    }

    r.open("POST","addmodelprocess.php",true);
    r.send(f);

}



var bm;

function addFeedback(id){
    // alert(id);
    // // var md;
    var feedback = document.getElementById("fm" + id);
    // alert(feedback);
    bm = new bootstrap.Modal(feedback);
    bm.show();
}

function saveFeedback(id){
    // alert(id);
    var rating;
    if (document.getElementById("or1").checked) {
        rating = 1;
    }else if (document.getElementById("or2").checked) {
        rating = 2;
    } else if (document.getElementById("or3").checked) {
        rating = 3;
    }
    var feedback = document.getElementById("feed");
    var f = new FormData();
    f.append("or",rating);
    f.append("pid",id);
    f.append("f",feedback.value);
    var r = new XMLHttpRequest();
    r.onreadystatechange = function(){
        if (r.readyState == 4) {
            var t = r.responseText;
            // alert(t);
            if (t == "success") {
                bm.hide();
                window.reload();
            }else{
                // alert (t);
                swal("", t, "error");
            }
        }
    }
    r.open("POST","saveFeedbackProcess.php",true);
    r.send(f);
}



function updateUserStatus() {
    var userid = document.getElementById("uid");

    // alert(userid.value);

    var f = new FormData();
    
    f.append("u", userid.value);

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if ((request.readyState == 4) & (request.status == 200)) {
            var t = request.responseText;

            window.location.reload();
            // swal("", t, "success");

            if (t == "Active") {
                // alert(t);
                // location.reload();

            } else if (t == "Deactive") {
                // alert(t);
                // location.reload();

            } else {
                
            }
        }
    };
    request.open("POST", "updateUserStatusProcess.php", true);
    request.send(f);
}

function filterincome() {
    //alert("Ok");

    var from = document.getElementById("from");
    var to = document.getElementById("to");


    var f = new FormData();
    f.append("from",from.value);
    f.append("to",to.value);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function(){
        if(r.status == 200 && r.readyState == 4){
            var t = r.responseText;

            // alert(t);
            // swal("", t, "success");

            document.getElementById("loadreport").innerHTML = t;

        }
    }

    r.open("POST","incomreportprocess.php",true);
    r.send(f);
}


function loadChart(){
    // alert("Ok");
    var ctx = document.getElementById('myChart');

    var r = new XMLHttpRequest();

    r.onreadystatechange = function(){
        if (r.readyState == 4 & r.status == 200) {
            var response  = r.responseText;
            // alert(response);
            var data = JSON.parse(response);
            new Chart(ctx, {
                type: 'bar',
                data: {
                  labels: data.labels,
                  datasets: [{
                    label: '# of Votes',
                    data: data.data,
                    borderWidth: 1
                  }]
                },
                options: {
                  scales: {
                    y: {
                      beginAtZero: true
                    }
                  }
                }
            });
        }
    }
    r.open("POST","loadChartProcess.php",true);
    r.send();
}

function loadChart3(){
    // alert("Ok");
    var ctx = document.getElementById('myChart2');

    var r = new XMLHttpRequest();

    r.onreadystatechange = function(){
        if (r.readyState == 4 & r.status == 200) {
            var response  = r.responseText;
            //alert(response);
            var data = JSON.parse(response);

            new Chart(ctx, {
                type: 'doughnut',
                data: {
                  labels: data.labels,
                  datasets: [{
                    label: '# of Votes',
                    data: data.data,
                    borderWidth: 1
                  }]
                },
                options: {
                  scales: {
                    y: {
                      beginAtZero: true
                    }
                  }
                }
            });
        }
    }
    r.open("POST","loadChartProcess2.php",true);
    r.send();
}

function loadProduct(x) {

    var page = x;
    // alert(x);
    var f = new FormData();
    f.append("p", page);
  
    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
      if (request.readyState == 4 & request.status == 200) {
        var response = request.responseText;
        // alert(response);
  
        document.getElementById("pid").innerHTML = response;
      }
    };
  
    request.open("POST", "loadProductProcess.php", true);
    request.send(f);
}

function loadChart2(){
    // alert("Ok");

    const ctx = document.getElementById('myChart3');

    var r = new XMLHttpRequest();

    r.onreadystatechange = function(){
        if (r.readyState == 4 & r.status == 200) {
            var response  = r.responseText;
            // alert(response);
            var data = JSON.parse(response);

            new Chart(ctx, {
                type: 'polarArea',
                data: {
                  labels: data.labels,
                  datasets: [{
                    label: '# of Votes',
                    data: data.data,
                    borderWidth: 1
                  }]
                },
                options: {
                  scales: {
                    y: {
                      beginAtZero: true
                    }
                  }
                }
            });

        }
    }

    r.open("POST","loadChartProcess.php",true);
    r.send();
}


function incrementCartQty(x) {

    // alert("Ok");

    var cartId = x;
    var qty = document.getElementById("qty" + x);
    // alert(qty.value);
    var newQty = parseInt(qty.value) + 1;
    // alert(newQty);

    var f = new FormData();
    f.append("c", cartId);
    f.append("q", newQty);

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 & request.status == 200) {
            var response = request.responseText;
            //alert(response);
            if (response == "Success") {
                qty.value = parseInt(qty.value) + 1;
                
                location.reload();
                
            } else {
                // alert(response);
            swal("", response, "error");

            }

        }
    };

    request.open("POST", "updateCartQtyProcess.php", true);
    request.send(f);

}

function decrementCartQty(x) {


    var cartId = x;
    var qty = document.getElementById("qty" + x);
    //alert(qty.value);
    var newQty = parseInt(qty.value) - 1;
    //alert(newQty);

    var f = new FormData();
    f.append("c", cartId);
    f.append("q", newQty);

    if (newQty > 0) {
        var request = new XMLHttpRequest();
        request.onreadystatechange = function () {
            if (request.readyState == 4 & request.status == 200) {
                var response = request.responseText;
                //alert(response);
                if (response == "Success") {
                    qty.value = parseInt(qty.value) - 1;
                    
                    location.reload();
                } else {
                    // alert(response);
                swal("", response, "error");

                }


            }
        };

        request.open("POST", "updateCartQtyProcess.php", true);
        request.send(f);
    }

}


function checkOut() {
    // alert("ok");

    var f = new FormData();
    f.append("cart",true);

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            var response = request.responseText;
            alert(response);
            var payment = JSON.parse(response);
            doCheckout(payment, "checkoutProcess.php");
        }
    }

    request.open("POST","paymentProcess.php",true);
    request.send(f);

}

function doCheckout(payment, path) {
    payhere.onCompleted = function onCompleted(orderId) {
        console.log("Payment completed. OrderID:" + orderId);

        var f = new FormData();
        f.append("payment", JSON.stringify(payment));

        var request = new XMLHttpRequest();
        request.onreadystatechange = function () {
            if (request.readyState == 4 & request.status == 200) {
                var response = request.responseText;
                // alert(response);
                // var order = JSON.parse(response);

                if (response == "success") {
                    // location.reload();
                    console.log("Order completed with ID: " +orderId);
                    window.location = "invoice.php?id="+orderId;
                    // saveInvoice (orderId, pid,obj["email"], obj["amount"], qty);
                } else {
                    alert(response);
                }
                // if (order.resp == "Success") {
                //     console.log("Order completed with ID: " +orderId);
                //     window.location = "invoice.php?orderId=" + order.order_id; // Fixed key name
                // } else {
                //     alert(response);
                // }
            }
        };
        request.open("POST", path, true);
        request.send(f);
    };
    // Payment window closed
    payhere.onDismissed = function onDismissed() {
        // Note: Prompt user to pay again or show an error page
        console.log("Payment dismissed");
    };
    // Error occurred
    payhere.onError = function onError(error) {
        // Note: show an error page
        console.log("Error:"  + error);
    };
    // Show the payhere.js popup, when "PayHere Pay" is clicked
    // document.getElementById('payhere-payment').onclick = function (e) {
        payhere.startPayment(payment);
    // };
}


function buynow(pid) {
    // alert(stockId);
    var qty = document.getElementById("qty_input");

    if (qty.value > 0) {
        
        var f = new FormData();
        f.append("cart", false);
        f.append("pid",pid);
        f.append("qty",qty.value);

        var request = new XMLHttpRequest();
        request.onreadystatechange = function () {
            if (request.readyState == 4 && request.status == 200) {
                var response = request.responseText;
                alert(response);
                var payment = JSON.parse(response);
                payment.pro_id = pid;
                payment.qty = qty.value;
                doCheckout(payment, "buynowProcess.php");
            }
        }

        request.open("POST","paymentProcess.php",true);
        request.send(f);
        
    } else {
        // alert("Please enter valid quantity");
        swal("", "Please enter valid quantity", "error");

    }
}
