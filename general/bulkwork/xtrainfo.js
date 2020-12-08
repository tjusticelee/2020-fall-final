function moreinfo(role) {
  const form = document.getElementsByClassName('register')[0];
  // in register.php puts the form with class of register in a variable called form
  if (role.value == 5) {
    const inputgenerate = (name, text) => {
      const patientInputLabel = document.createElement("label");
      patientInputLabel.setAttribute("for", name);
      patientInputLabel.appendChild(document.createTextNode(text));

      const patientInput = document.createElement("input");
      patientInput.setAttribute("type", "text");
      patientInput.setAttribute("name", name);
      patientInput.setAttribute("class", "patient");

      const submit = document.getElementById("submit");
      form.insertBefore(patientInputLabel, submit);
      form.insertBefore(patientInput, submit);
    }
    inputgenerate('familycode', "Family Code: ");
    inputgenerate('emer_contact', "Emergency Contact: ");
    inputgenerate('relation', 'Relation: ');
  }
}
