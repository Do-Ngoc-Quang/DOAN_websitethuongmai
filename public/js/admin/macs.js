

$(function () {
  getMacs();
});

function getMacs() {
    $.ajax({
        method: "GET",
        url: "/macs",
    })
    .done(function (response) {
        let lst_macs = response.data; // Retrieve the data from the 'data' property of the response object
        console.log(lst_macs);
        if (Array.isArray(lst_macs) && lst_macs.length > 0) {
            $("#tbodyMacs").html("");
            console.log(lst_macs);
            lst_macs.forEach(function (mac) {
                $("#macs_display").tmpl(mac).appendTo("#tbodyMacs");
            });
        } else {
            let str = "<caption>NO DATA FOUND</caption>";
            $("#tbodyMacs").html(str);
        }
    })
    .fail(function (jqXHR, textStatus, errorThrown) {
        console.log(textStatus);
    });
}

  

// function getMacs(lst_macs) {
//     if (Array.isArray(lst_macs) && lst_macs.length > 0) {
//       $("#tbodyMacs").html("");
//       lst_macs.forEach(function (mac) {
//         $("#macs_display").tmpl(mac).appendTo("#tbodyMacs");
//       });
//     } else {
//       let str = "<caption>NO DATA FOUND</caption>";
//       $("#tbodyMacs").html(str);
//     }
//   }
  
//   // Call the function and pass the data
//   var data = [{"id":10,"name":"m","price":"44","color":"black","picture":"public\/images_macs\/vb3Alr9qB16KVeQDqg6770Nt7mFrMvET8xCLMjwf.png","description":"fgfdgd","created_at":null,"updated_at":null},{"id":11,"name":"1","price":"3333","color":"black","picture":"public\/images_macs\/diTLguOT6ORup5S0JDh3bdppBLgv0Jy5tE7lxTKs.png","description":"fg","created_at":null,"updated_at":null},{"id":12,"name":"1","price":"3333","color":"black","picture":"yTC9BVLO2neptlmGFFucA1gJexL4h7HHNNq2dIUF.png","description":"fg","created_at":null,"updated_at":null},{"id":13,"name":"1","price":"1000","color":"white","picture":"pCwNc0wgyJvPPHrmo2pW2FmdLVq8dnjfGZdo1jcV.png","description":"dsf","created_at":null,"updated_at":null}];
  
//   getMacs(data);
  
  


// function addStudents() {

//   gt = $('input[name="gender"]:checked').val();
//   $.ajax({
//     method: "POST",
//     url: "/students",
//     data: {
//       MaSV: $("#txtCodeAdd").val(),
//       HoTen: $("#txtNameAdd").val(),
//       Lop: $("#txtClassAdd").val(),
//       GioiTinh: gt,
//       NgaySinh: $("#dateAdd").val(),
//     }
//   })
//     .done(function (res) {
//       if (res.success) alert(res.msg);
//       else alert(res.msg);
//     }).fail(function (jqXHR, textStatus, errorThrown) { console.log(textStatus) });

// }


// function updateStudent() {
//   var gt = $('input[name="genderEdit"]:checked').val();
//   var data = {
//     "MaSV": $("#txtCodeEdit").val(),
//     "HoTen": $("#txtNameEdit").val(),
//     "Lop": $("#txtClassEdit").val(),
//     "GioiTinh": gt,
//     "NgaySinh": $("#dateEdit").val(),
//   };
//   var studentCode = $("#txtCodeEdit").val();
//   console.log(studentCode);
//   $.ajax({
//     method: "PUT",
//     url: "http://localhost:3000/students/" + studentCode,
//     data: data
//   })
//     .done(function (res) {
//       if (res.success) alert(res.msg);
//       else alert("Update student success");
//     }).fail(function (jqXHR, textStatus, errorThrown) { console.log(textStatus) });

// }

// function deleteStudent(mssv) {
//   if (confirm("Bạn có chắc chắn muốn xóa không?")) {
//     $.ajax({
//       method: "DELETE",
//       url: "http://localhost:3000/students",
//       data: {
//         "MaSV": mssv,
//       }
//     })
//       .done(function (res) {
//         if (res.success) {
//           alert(res.msg);
//           getStudents();
//         }
//         else alert(res.msg);
//       }).fail(function (jqXHR, textStatus, errorThrown) { console.log(textStatus) });
//   }
// }




