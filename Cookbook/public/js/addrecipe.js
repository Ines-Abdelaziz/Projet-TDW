function appendUserRow(id, user) {
    var html = "<div id=\"opt-row." + id + "\" class=\"form-group row\">\n" +
        "            <div class=\"col\">\n" +
        "                <textarea required rows=\"2\" class=\"form-control\" id=\"step" + id + "\" name=\"step" + id + "\" placeholder=\"New Step \" value=\"" + user.type + "\"></textarea>\n" +
        "            </div>\n" +
        "            <div class=\"col\">\n" +
        "             <button type=\"button\" onclick=\"delRow(" + id + ")\" class=\"btn btn-danger\">Delete</button>\n" +
        "            </div>\n" +
        "        </div>";
    $("#form-placeholder").append(html);
}
function appendIngRow(id, user) {
    html = "<div id=\"opt-row1." + id + "\" class=\"form-group row\">\n" +
    "            <div class=\"col-3\">\n" +
    "                <select required  class=\"selectpicker\" data-live-search=\"true\" id=\"ing" + id + "\" name=\"ing" + id + "\" >" + ingredients + "</select>\n" +
    "            </div>\n" +
    "            <div class=\"col-2\">\n" +
    "                <input required type=\"number\" class=\"form-control\" id=\"qua" + id + "\" name=\"qua" + id + "\" placeholder=\"quantity\" value=\"" + user.no + "\">\n" +
    "            </div>\n" +
    "            <div class=\"col-2\">\n" +
    "             <button type=\"button\" onclick=\"delRow1(" + id + ")\" class=\"btn btn-danger\">Delete</button>\n" +
    "            </div>\n" +
    "        </div>";
        console.log(html);
    $("#form-placeholder1").append(html);
    $('.selectpicker').selectpicker();

}


function delRow(id) {
    var element = document.getElementById("opt-row." + id);
    element.parentNode.removeChild(element);
}
function delRow1(id) {
    var element = document.getElementById("opt-row1." + id);
    element.parentNode.removeChild(element);
}
$(document).ready(function () {
    var count = 0;
    var count1= 0;
$("#btn-add").click(function () {
        appendUserRow(count++, {
            type: "",
        })
        document.cookie = "count = " + count;
    });
$("#btn-add1").click(function () {
        appendIngRow(count1++, {
            type: "",
            no:0,
        })
        document.cookie = "count1 = " + count1;

    });   

});