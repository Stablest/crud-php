let changed_rows = [];

const submit = $("#salvar").click(async function () {
  const updatedDataList = [];
  changed_rows.forEach((row, index) => {
    const spans = $(`td[data-value=${row.index}]>span`);
    const inputs = $(`td[data-value=${row.index}]>input`);
    const id = $(inputs[1]).parent().data("value");
    const updatedData = {
      id: id,
      username:
        $(inputs[1]).prop("value").length === 0
          ? $(spans[0]).text()
          : $(inputs[1]).prop("value"),
      email:
        $(inputs[2]).prop("value").length === 0
          ? $(spans[1]).text()
          : $(inputs[2]).prop("value"),
      permission:
        $(inputs[3]).prop("value").length === 0
          ? $(spans[2]).text()
          : $(inputs[3]).prop("value"),
    };
    updatedDataList.push(updatedData);
  });
  try {
    const promises = [];
    updatedDataList.forEach((updatedData) => {
      promises.push(
        $.ajax({
          url: "./../../src/user/user.inc.php",
          type: "PUT",
          data: JSON.stringify(updatedData),
        }).promise()
      );
    });
    const result = await Promise.all(promises);
  } catch (e) {
    console.error("Something went wrong");
  }
});

function create_new_row(name) {
  let newName = {
    username: null,
    email: null,
    permission: null,
  };

  switch (name) {
    case "username":
      newName.username = name;
      break;
    case "email":
      newName.email = name;
      break;
    case "permission":
      newName.permission = name;
      break;
  }
  return newName;
}

const tds = $("td").click(function () {
  const input = $(this).children("input");
  const span = $(this).children("span");
  if (input.attr("hidden") === "hidden") {
    input.attr("hidden", false);
    span.attr("hidden", true);
    const index = $(this).data("value");
    const name = input.attr("name").split("_", 1)[0];
    let isRepeated = false;
    if (changed_rows.length > 0) {
      changed_rows.forEach((element) => {
        if (index === element.index) {
          element.names[name] = name;
          isRepeated = true;
        }
      });
      if (isRepeated) return;
    }
    const newName = create_new_row(name);
    changed_rows.push({
      names: newName,
      index: index,
    });
  }
});
