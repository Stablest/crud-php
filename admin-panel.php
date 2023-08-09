<div class="w-100 p-4 border d-flex flex-column align-items-center">
    <div>
        <button class="" id="salvar">Salvar</button>
        <button class="" id="salvar">Deletar</button>
        <div id="container">

        </div>
    </div>
</div>
<script type='module'>
    const populateDivs = (data) => {
        let html = `
            <table class="bg-info border rounded-2">
                <thead>
                    <tr>
                        <th class="px-3">#</th>
                        <th class="px-3">username</th>
                        <th class="px-3">email</th>
                        <th class="px-3">permission</th>
                    </tr>
                </thead>
                <tbody>`
        data.forEach((element, index) => {
            html += `
                <tr>
                    <td class="px-3" data-value=${element.id}><input type="checkbox" name="check_${element.id}"></td>
                    <td class="px-3" data-value=${element.id}><input type="text" hidden name="username_${element.id}" placeholder="Usuário"><span>${element.username}</span></td>
                    <td class="px-3" data-value=${element.id}><input type="email" hidden name="email_${element.id}" placeholder="E-mail"><span>${element.email}</span></td>
                    <td class="px-3" data-value=${element.id}><input type="text" hidden name="permission_${element.id}" placeholder="Permissão"><span>${element.permission}</span></td>
                </tr>`
        })
        html += '</tbody></table>'
        return html

    }

    const res = await fetch("./includes/admin/admin-getusers.inc.php")
    const data = await res.json();
    const html = populateDivs(data);
    $('#container').html(html)

    //////////////////////

    let changed_rows = []

    const submit = $('#salvar').click(async function() {
        const updatedDataList = []
        changed_rows.forEach((row, index) => {
            const spans = $(`td[data-value=${row.index}]>span`)
            const inputs = $(`td[data-value=${row.index}]>input`)
            const id = $(inputs[1]).parent().data('value')
            const updatedData = {
                id: id,
                username: $(inputs[1]).prop('value').length === 0 ? $(spans[0]).text() : $(inputs[1]).prop('value'),
                email: $(inputs[2]).prop('value').length === 0 ? $(spans[1]).text() : $(inputs[2]).prop('value'),
                permission: $(inputs[3]).prop('value').length === 0 ? $(spans[2]).text() : $(inputs[3]).prop('value')
            }
            updatedDataList.push(updatedData)
        })
        console.log('Updated Data : ', updatedDataList)
        const result = await $.post('./includes/admin/admin-updateusers.inc.php', JSON.stringify(updatedDataList[0]))
        console.log(result)
        // changed_rows.forEach((element) => {

        //     promises.push()
        // })
    })

    function create_new_row(name) {
        let newName = {
            username: null,
            email: null,
            permission: null,
        }

        switch (name) {
            case 'username':
                newName.username = name
                break
            case 'email':
                newName.email = name
                break
            case 'permission':
                newName.permission = name
                break
        }
        return newName
    }

    const tds = $('td').click(function() {
        const input = $(this).children('input')
        const span = $(this).children('span');
        if (input.attr('hidden') === 'hidden') {
            input.attr('hidden', false)
            span.attr('hidden', true)
            const index = $(this).data('value')
            const name = input.attr('name').split('_', 1)[0]
            let isRepeated = false
            if (changed_rows.length > 0) {
                changed_rows.forEach((element) => {
                    if (index === element.index) {
                        element.names[name] = name
                        isRepeated = true
                    }
                })
                if (isRepeated)
                    return
            }
            const newName = create_new_row(name)
            changed_rows.push({
                names: newName,
                index: index,
            })
        }
    })
</script>