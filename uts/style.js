document.addEventListener('DOMContentLoaded', function () {
  const rspn = document.getElementById('responsibility');
  const tmw = document.getElementById('teamwork');
  const mng = document.getElementById('management_time');
  const total = document.getElementById('total');
  const grade = document.getElementById('grade');

  rspn.addEventListener('input', hitungtotal);
  tmw.addEventListener('input', hitungtotal);
  mng.addEventListener('input', hitungtotal);

  function hitungtotal() {
    const respon = rspn.value || 0;
    const teamwork = tmw.value || 0;
    const manage = mng.value || 0;
    const total2 = respon * 0.3 + teamwork * 0.3 + manage * 0.4;
    total.value = total2.toFixed(2);
    if (total2 >= 80) {
      grade.value = 'A';
    } else if (total2 >= 60) {
      grade.value = 'B';
    } else if (total2 >= 40) {
      grade.value = 'C';
    } else if (total2 >= 0) {
      grade.value = 'D';
    }
    gr = grade.value;
  }
});


  

