import '../scss/style.scss'
import * as bootstrap from 'bootstrap'
import $ from 'jquery'

import swal from 'sweetalert2';
window.Swal = swal;

const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))

$("#myform").submit(function () {
    $(".spinner-border").removeClass("hide");
    $(".submit").attr("disabled", true);
    $(".btn-txt").text("Loading ...");
});