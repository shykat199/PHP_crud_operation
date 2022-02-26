
  let id = $("input[name*='book_id']");
  id.attr("readonly", "readonly");

$(".btnedit").click(e => {

  let textvalues = desplayData(e);

  //console.log(textvalues);
  let bookname = $("input[name*='book_name']");
  let bookpublisher = $("input[name*='book_publisher']");
  let bookprice = $("input[name*='book_price']");
  

  //console.log(textvalues[0]);
  //console.log(textvalues[1]);
  id.val(textvalues[0]);
  bookname.val(textvalues[1]);
  bookpublisher.val(textvalues[2]);
  bookprice.val(textvalues[3].replace("$ ",""));
});

function desplayData(e) {
  let id = 0;
  //table data in td variable
  const td = $("#tbody tr td");
  let textvalues = [];

  for (const value of td) {
      //console.log(value);
    if (value.dataset.id == e.target.dataset.id) {
      textvalues[id++] = value.textContent;
    }
  }
  return textvalues;
}
