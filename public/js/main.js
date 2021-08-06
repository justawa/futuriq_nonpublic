$(document).ready(function() {
    let type_error = true,
        certification_class_error = true,
        user_type_error = true,
        validity_error = true,
        nationality_error = true,
        ekyc_type_error = false,
        pan_error = true,
        name_error = true,
        mobile_error = true,
        birthday_error = true,
        gender_error = true,
        pincode_error = true,
        state_error = true,
        city_error = true,
        address_error = true,
        remark_error = true,
        ekyc_pin_error = true,
        c_ekyc_pin_error = true,
        c_ekyc_pin_match_error = false,
        photo_file_error = true,
        pan_file_error = true,
        address_file_error = true;
    let type,
        certification_class,
        user_type,
        validity,
        nationality,
        ekyc_type = "Pan",
        pan,
        name,
        mobile,
        birthday;

    $('input[name="type"]').on("change", function() {
        const selectedValue = $(this).val();
        if (!selectedValue) {
            type_error = true;
        } else {
            type_error = false;
            $("#type_error").html(" ");
            $("#put_pan").text(selectedValue);
        }
    });

    $('select[name="certification_class"]').on("change", function() {
        const selectedValue = $(this).val();
        if (!selectedValue) {
            certification_class_error = true;
        } else {
            certification_class_error = false;
            user_type_error = false;
            nationality_error = false;
            $("#certification_class_error").html(" ");
            $('select[name="user_type"]').val("Individual");
            $('select[name="nationality"]').val("India");

            $("#put_certification_class").text(selectedValue);
            $("#put_user_type").text("Individual");
            $("#put_nationality").text("India");
        }
    });

    $('select[name="user_type"]').on("change", function() {
        const selectedValue = $(this).val();
        if (!selectedValue) {
            user_type_error = true;
        } else {
            user_type_error = false;
            $("#user_type_error").html(" ");
            $("#put_user_type").text(selectedValue);
        }
    });

    $('select[name="validity"]').on("change", function() {
        const selectedValue = $(this).val();
        if (!selectedValue) {
            validity_error = true;
        } else {
            validity_error = false;
            $("#validity_error").html(" ");
            $("#put_validity").text(selectedValue);
        }
    });

    $('select[name="nationality"]').on("change", function() {
        const selectedValue = $(this).val();
        if (!selectedValue) {
            nationality_error = true;
        } else {
            nationality_error = false;
            $("#nationality_error").html(" ");
            $("#put_nationality").text(selectedValue);
        }
    });

    $('input[name="pan"]').on("blur", function() {
        const selectedValue = $(this).val();
        if (!selectedValue) {
            pan_error = true;
        } else {
            pan_error = false;
            $("#pan_error").html(" ");
            $("#put_pan").text(selectedValue);
            $("#signer_id").val(`${selectedValue}@pan.futuriq`);
        }
    });

    $('input[name="name"]').on("blur", function() {
        const selectedValue = $(this).val();
        if (!selectedValue) {
            name_error = true;
        } else {
            name_error = false;
            $("#name_error").html(" ");
            $("#put_name").text(selectedValue);
        }
    });

    $('input[name="mobile"]').on("blur", function() {
        const selectedValue = $(this).val();
        if (!selectedValue) {
            mobile_error = true;
        } else {
            mobile_error = false;
            $("#mobile_error").html(" ");
            $("#put_mobile").text(selectedValue);
        }
    });

    $('input[name="birthday"]').on("blur", function() {
        const selectedValue = $(this).val();
        if (!selectedValue) {
            birthday_error = true;
        } else {
            birthday_error = false;
            $("#birthday_error").html(" ");
            $("#put_birthday").text(selectedValue);
        }
    });

    $('input[name="gender"]').on("change", function() {
        const selectedValue = $(this).val();
        if (!selectedValue) {
            gender_error = true;
        } else {
            gender_error = false;
            $("#gender_error").html(" ");
            $("#put_gender").text(selectedValue);
        }
    });

    $('input[name="pincode"]').on("blur", function() {
        const selectedValue = $(this).val();
        if (!selectedValue) {
            pincode_error = true;
        } else {
            pincode_error = false;
            $("#pincode_error").html(" ");
            $("#put_pincode").text(selectedValue);
        }
    });

    $('input[name="state"]').on("blur", function() {
        const selectedValue = $(this).val();
        if (!selectedValue) {
            state_error = true;
        } else {
            state_error = false;
            $("#state_error").html(" ");
            $("#put_state").text(selectedValue);
        }
    });

    $('input[name="city"]').on("blur", function() {
        const selectedValue = $(this).val();
        if (!selectedValue) {
            city_error = true;
        } else {
            city_error = false;
            $("#city_error").html(" ");
            $("#put_city").text(selectedValue);
        }
    });

    $('textarea[name="address"]').on("blur", function() {
        const selectedValue = $(this).val();
        if (!selectedValue) {
            address_error = true;
        } else {
            address_error = false;
            $("#address_error").html(" ");
            $("#put_address").text(selectedValue);
        }
    });

    $('input[name="remark"]').on("blur", function() {
        const selectedValue = $(this).val();
        if (!selectedValue) {
            remark_error = true;
        } else {
            remark_error = false;
            $("#remark_error").html(" ");
            $("#put_remark").text(selectedValue);
        }
    });

    $('input[name="ekyc_pin"]').on("blur", function() {
        const selectedValue = $(this).val();
        if (!selectedValue) {
            ekyc_pin_error = true;
        } else {
            ekyc_pin_error = false;
            $("#ekyc_pin_error").html(" ");
            ekyc_pin = selectedValue;
        }
    });

    $('input[name="c_ekyc_pin"]').on("blur", function() {
        const selectedValue = $(this).val();
        if (!selectedValue) {
            c_ekyc_pin_error = true;
        } else {
            // if ($(this).val() !== ekyc_pin) {
            //     c_ekyc_pin_match_error = true;
            // } else {
            c_ekyc_pin_error = false;
            $("#c_ekyc_pin_error").html(" ");
            c_ekyc_pin = selectedValue;
            // }
        }
    });

    $("#photo_file").on("change", function() {
        if ($("#photo_file").get(0).files.length === 0) {
            photo_file_error = true;
        } else {
            photo_file_error = false;
            readImageURL(this, "#applicant_photo");
        }
    });

    $("#pan_file").on("change", function() {
        if ($("#pan_file").get(0).files.length === 0) {
            pan_file_error = true;
        } else {
            pan_file_error = false;
        }
    });

    $("#address_file").on("change", function() {
        if ($("#address_file").get(0).files.length === 0) {
            address_file_error = true;
        } else {
            address_file_error = false;
        }
    });

    // -------------------------------------------------------------------------------------------
    $("#move_step2").on("click", function() {
        if (type_error) {
            $("#type_error").html(
                `<span style="color: red">Please select type</span>`
            );
        } else {
            $("#step1").hide();
            $("#step2").show();
        }
    });

    $("#move_step3").on("click", function() {
        if (certification_class_error) {
            $("#certification_class_error").html(
                `<span style="color: red">Please select certificate class</span>`
            );
        } else if (user_type_error) {
            $("#user_type_error").html(
                `<span style="color: red">Please select user type</span>`
            );
        } else if (validity_error) {
            $("#validity_error").html(
                `<span style="color: red">Please select validity</span>`
            );
        } else if (nationality_error) {
            $("#nationality_error").html(
                `<span style="color: red">Please select nationality</span>`
            );
        } else {
            $("#step2").hide();
            $("#step3").show();
        }
    });

    $("#move_step4").on("click", function() {
        if (pan_error) {
            $("#pan_error").html(
                `<span style="color: red">Please select pan</span>`
            );
        } else if (name_error) {
            $("#name_error").html(
                `<span style="color: red">Please select name</span>`
            );
        } else if (mobile_error) {
            $("#mobile_error").html(
                `<span style="color: red">Please select mobile</span>`
            );
        } else if (birthday_error) {
            $("#birthday_error").html(
                `<span style="color: red">Please select birthday</span>`
            );
        } else if (gender_error) {
            $("#gender_error").html(
                `<span style="color: red">Please select gender</span>`
            );
        } else if (pincode_error) {
            $("#pincode_error").html(
                `<span style="color: red">Please select pincode</span>`
            );
        } else if (state_error) {
            $("#state_error").html(
                `<span style="color: red">Please select state</span>`
            );
        } else if (city_error) {
            $("#city_error").html(
                `<span style="color: red">Please select city</span>`
            );
        } else if (address_error) {
            $("#address_error").html(
                `<span style="color: red">Please select address</span>`
            );
        } else if (remark_error) {
            $("#remark_error").html(
                `<span style="color: red">Please select remark</span>`
            );
        } else if (ekyc_pin_error) {
            $("#ekyc_pin_error").html(
                `<span style="color: red">Please select pin</span>`
            );
        } else if (c_ekyc_pin_error) {
            $("#c_ekyc_pin_error").html(
                `<span style="color: red">Please select confirm pin</span>`
            );
        } else if (c_ekyc_pin_match_error) {
            $("#c_ekyc_pin_error").html(
                `<span style="color: red">pin don't match</span>`
            );
        } else if (photo_file_error) {
            $("#photo_file_error").html(
                `<span style="color: red">photo file required</span>`
            );
        } else if (pan_file_error) {
            $("#pan_file_error").html(
                `<span style="color: red">pan file required</span>`
            );
        } else if (address_file_error) {
            $("#address_file_error").html(
                `<span style="color: red">address file is required</span>`
            );
        } else {
            $("#step3").hide();
            $("#step4").show();
        }
    });

    // const today = new Date();

    // const date =
    //     today.getFullYear() +
    //     "-" +
    //     (today.getMonth() + 1) +
    //     "-" +
    //     today.getDate() +
    //     " " +
    //     today.getHours() +
    //     ":" +
    //     today.getMinutes() +
    //     ":" +
    //     today.getSeconds();

    // $("#current_time").text(date);

    $("#move_step_2").on("click", function() {
        $("#step_1").hide();
        $("#step_2").show();
        $("#step1-head").removeClass("highlight-step");
        $("#step2-head").addClass("highlight-step");
    });

    $("#confirmation_checked").on("change", function() {
        const application_id = $('input[name="application_id"]').val();
        const dob = $('input[name="birthday"]').val();
        if ($(this).is(":checked")) {
            fetchDataUsingApplicationIdAndDob(
                { application_id, dob },
                showEnrolmentDataInList
            );
        } else {
            $("#all_error").html(
                `<span style="color: red">Please check the box</span>`
            );
        }
    });

    $("#search_by_application_id").on("submit", function(e) {
        e.preventDefault();
        const application_id = $('input[name="application_id"]').val();
        fetchDataUsingApplicationId(application_id, showEnrolmentDataInTable);
    });
});

function fetchDataUsingApplicationIdAndDob(data, cb) {
    $.ajax({
        url: "/enrolment/application_id_and_dob",
        type: "GET",
        data: data,
        success: function(data) {
            // alert(data);
            console.log(data);
            cb(data);
            $("#move_step_2").attr("disabled", false);
        },
        error: function(err) {
            $("#all_error").html(
                `<span style="color: red">${err.responseJSON.message}</span>`
            );
        }
    });
}

function fetchDataUsingApplicationId(id, cb) {
    $.ajax({
        url: "/enrolment/application_id",
        type: "GET",
        data: { application_id: id },
        success: function(data) {
            // alert(data);
            console.log(data);
            cb(data);
        }
    });
}

function showEnrolmentDataInList(data) {
    $("#applicant_name").text(data.name);
    $("#applicant_application_id").text(data.application_id);
    $("#applicant_dob").text(data.birthday);
}

function showEnrolmentDataInTable(data) {
    $("#dsc-list-dynamic-body").html(" ");
    $("#dsc-list-dynamic-body").append(`<tr>
            <td><input type="checkbox" /></td>
            <td>${data.pan}</td>
            <td>${data.name}</td>
            <td></td>
            <td>${data.mobile}</td>
            <td>${data.pin}</td>
            <td>${data.state}</td>
            <td></td>
            <td>${data.certification_class}</td>
            <td>${data.validity}</td>
            <td></td>
            <td>Pending</td>
            <td>
              Pending
              <p><a target="_blank" href="/vidoerecord">Video Link</a></p>
            </td>
            <td>Pending</td>
            <td>Approve/Reject</td>
          </tr>`);
}

function readImageURL(input, el) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            // $(type + el).css("display", "block");
            $(el).attr("src", e.target.result);
        };
        reader.readAsDataURL(input.files[0]);
    }
}
