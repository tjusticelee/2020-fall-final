const getName = () => {
  const id = patid.value
  const http = new window.XMLHttpRequest()
  http.onreadystatechange = function () {
    if (this.readyState === 4 && this.status === 200) {
      document.getElementById('patname').value = this.responseText
      this.responseText === 'Invalid ID' ? submit.setAttribute('disabled', '') : submit.removeAttribute('disabled')
    }
  }

  http.open('POST', 'name.php')
  http.setRequedtHeader('Content-type', 'application/x-www-form-urlencoded')
  http.send('id=' + id)
}

const pid = document.getElementById('patid')
const submit = document.getElementById('submit')
pid.addEventListener('change', getName)
