/*DataTable Init*/

"use strict";

$(document).ready(function () {
    $("#datable_1").DataTable({
        dom: "Bfrtip",
        responsive: true,
        language: { search: "", searchPlaceholder: "Search" },
        info: false,
        bFilter: true,
        buttons: ["copy", "excel"],
        drawCallback: function () {
            $(".dt-buttons > .btn").addClass("btn-outline-light btn-sm");
        },
    });
    $("#datable_2").DataTable({
        dom: "Bfrtip",
        responsive: true,
        language: { search: "", searchPlaceholder: "Search" },
        info: false,
        bFilter: true,
        buttons: ["copy", "excel"],
        drawCallback: function () {
            $(".dt-buttons > .btn").addClass("btn-outline-light btn-sm");
        },
    });

    /*Export DataTable*/
    $("#datable_3").DataTable({
        dom: "Bfrtip",
        responsive: true,
        language: { search: "", searchPlaceholder: "Search" },
        info: false,
        bFilter: true,
        buttons: ["copy", "excel"],
        drawCallback: function () {
            $(".dt-buttons > .btn").addClass("btn-outline-light btn-sm");
        },
    });

    $("#datable_4").DataTable({
        dom: "Bfrtip",
        responsive: true,
        language: { search: "", searchPlaceholder: "Search" },
        info: false,
        bFilter: true,
        buttons: ["copy", "excel"],
        drawCallback: function () {
            $(".dt-buttons > .btn").addClass("btn-outline-light btn-sm");
        },
    });

    var table = $("#datable_5").DataTable({
        responsive: true,
        language: {
            search: "",
            sLengthMenu: "_MENU_Items",
        },
        bPaginate: false,
        info: false,
        bFilter: false,
    });
    $("#datable_5 tbody").on("click", "tr", function () {
        if ($(this).hasClass("selected")) {
            $(this).removeClass("selected");
        } else {
            table.$("tr.selected").removeClass("selected");
            $(this).addClass("selected");
        }
    });

    $("#button").click(function () {
        table.row(".selected").remove().draw(false);
    });
});
