function openTaskViewModal() {
  $("#taskViewModal").modal("show");
}

let buttons = document.querySelectorAll(".taskViewButton");
buttons.forEach(function (button) {
  button.addEventListener("click", function (e) {
    e.preventDefault();
    let helpcode = button.dataset.helpcode;
    let student_name = button.dataset.name;
    let student_phone = button.dataset.phone;
    let request_status = button.dataset.status;
    let adminID = button.dataset.adminid;
    let adminName = button.dataset.adminname;
    let requestDescription = button.dataset.description;

    document.getElementById("sHelpCode").value = helpcode;
    document.getElementById("sName").value = student_name;
    document.getElementById("sPhone").value = student_phone;
    document.getElementById("sRequestStatus").value = request_status;
    document.getElementById("adminID").value = adminID;
    document.getElementById("adminName").value = adminName;
    document.getElementById("rDescription").value = requestDescription;
    openTaskViewModal();
  });
});

function changeTeamModal() {
  $("#teamUpdateModal").modal("show");
}
let elements = document.querySelectorAll(".team_change_button");
elements.forEach(function (element) {
  element.addEventListener("click", function (e) {
    e.preventDefault();
    let helpid = element.dataset.helpcode;
    let previousTeam = element.dataset.previous_team;
    let adminId = element.dataset.adminidentity;

    document.getElementById("request_helpcode").value = helpid;
    document.getElementById("previous_team").value = previousTeam;
    document.getElementById("admin_identity_no").value = adminId;

    changeTeamModal();
  });
});

function successTaskDetails() {
  $("#successModal").modal("show");
}
let btns = document.querySelectorAll(".successful_task_view");
btns.forEach(function (btn) {
  btn.addEventListener("click", function (e) {
    e.preventDefault();
    let helpid = btn.dataset.helpcode;
    document.getElementById("student_HelpId").value = helpid;

    let sname = btn.dataset.name;
    document.getElementById("student-name").value = sname;

    let sphone = btn.dataset.phonenumber;
    document.getElementById("student-phone").value = sphone;

    let request_Status = btn.dataset.status;
    document.getElementById("request-status").value = request_Status;

    let request_info = btn.dataset.info;
    document.getElementById("request_details").value = request_info;

    let request_report = btn.dataset.report;
    document.getElementById("incident-report").value = request_report;

    successTaskDetails();
  });
});

function failedTaskDetails() {
  $("#failureModal").modal("show");
}
let Buttons = document.querySelectorAll(".view-failed-tasks-btn");
Buttons.forEach(function (Button) {
  Button.addEventListener("click", function (e) {
    e.preventDefault();

    let helpid = Button.dataset.helpcode;
    document.getElementById("student_HelpId").value = helpid;

    let sname = Button.dataset.name;
    document.getElementById("student-name").value = sname;

    let sphone = Button.dataset.phonenumber;
    document.getElementById("student-phone").value = sphone;

    let request_Status = Button.dataset.status;
    document.getElementById("request-status").value = request_Status;

    let request_info = Button.dataset.info;
    document.getElementById("request_details").value = request_info;

    let request_report = Button.dataset.report;
    document.getElementById("incident-report").value = request_report;

    failedTaskDetails();
  });
});

function teamRegistration() {
  $("#teamRegistration").modal("show");
}
let teamBtn = document.querySelector(".addNewTeam");

teamBtn.addEventListener("click", function (e) {
  e.preventDefault();

  teamRegistration();
});

function teamMemberRegistration() {
  $("#addTeamMember").modal("show");
}
let butons = document.querySelectorAll(".team_member_button");
butons.forEach(function (Buton) {
  Buton.addEventListener("click", function (e) {
    e.preventDefault();

    let teamid = Buton.dataset.teamid;
    document.getElementById("member-teamid").value = teamid;

    teamMemberRegistration();
  });
});

function editRescueTeam() {
  $("#editRescueTeam").modal("show");
}
let editButtons = document.querySelectorAll(".team-edit-btn");
editButtons.forEach(function (editButton) {
  editButton.addEventListener("click", function (e) {
    e.preventDefault();
    let teamid = editButton.dataset.team;
    document.getElementById("teamid").value = teamid;

    let teamname = editButton.dataset.tname;
    document.getElementById("teamname").value = teamname;

    let teamusername = editButton.dataset.username;
    document.getElementById("teamusername").value = teamusername;

    let teamtel = editButton.dataset.teamphone;
    document.getElementById("teamphone").value = teamtel;

    let teammail = editButton.dataset.teammail;
    document.getElementById("teammail").value = teammail;

    editRescueTeam();
  });
});

function deleteTeamModal() {
  $("#deleteConfirmModal").modal("show");
}
let deleteButtons = document.querySelectorAll(".team_delete-btn");
deleteButtons.forEach(function (deleteButton) {
  deleteButton.addEventListener("click", function (e) {
    e.preventDefault();

    let rescueteamid = deleteButton.dataset.rescueteamid;
    document.getElementById("teamIdentityNumber").value = rescueteamid;

    deleteTeamModal();
  });
});
