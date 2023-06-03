let list = document.querySelectorAll(".list a");
for (let i = 0; i < list.length; i++) {
  list[i].onclick = (e) => {
    let j = 0;
    while (j < list.length) {
      list[j++].className = "list";
    }
    list[i].className = "list active";
  };
}