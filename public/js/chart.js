$(document).ready(function () {
  let endYear = new Date().getFullYear;
  let startYear = 1800;

  for (i = endYear; i > startYear; i--) {
    $("#yearpicker").append($("<option />").val(i).html(i));
  }
});

function handleFilter(myChart) {
  const year = $("select").val();

  $.ajax({
    type: "GET",
    url: "",
    data: {
      year: year,
    },
    success: function (result) {
      $("#year").text(year);
      myChart.config.data.datasets[0].data = result.data;
      myChart.update(myChart.config);
    },
    error: function (xhr, error) {
      console.log(xhr);
    },
  });
}
