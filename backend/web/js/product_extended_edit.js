(function($){
    $(document).ready(function() {

        var catListAvail = $('#catListAvail');
        var catListEnable = $('#catListEnable');
        var btnAddCategory = $('#btnAddCategory');

        var list = [];
        catListAvail.find('option').each(function(i, e) {
            e = $(e);
            list.push({id: e.val(), name: e.text()});
        });

        var closeBtnTemplate = '<button type="button" class="close" aria-label="Close"><span aria-hidden="true">&times;</span></button>';

        function refreshAvailCats() {
            var htm = '';
            for (var i in list) {
                if(catListEnable.find('input[value="' + list[i].id + '"]').length)
                    continue;
                htm += '<option value="' + list[i].id + '">' + list[i].name + '</option>';
            }
            catListAvail.html(htm);
        }
        function addCategory() {
            var opt = catListAvail.find('option:selected');

            var inp = '<input type="hidden" name="'
                + btnAddCategory.attr('data-form-name')
                + '[' + btnAddCategory.attr('data-attribute')
                + '][]" value="' + opt.val() + '" />';
            var html = '<span class="badge">' + inp + opt.text() + closeBtnTemplate + '</span>';
            catListEnable.append(html);
        }

        btnAddCategory.on('click', function(e) {
            e.preventDefault();
            addCategory();
            refreshAvailCats();
        });
        catListEnable.on('click', '.close', function() {
            $(this).parent().remove();
            refreshAvailCats();
        });

        refreshAvailCats();

        //


        var varieties = $('#varieties');
        var btnAddVariety = $('#btnAddVariety');
        var varietyTemplate = $('#varietyTemplate').html();
        var varietyIndex = $('#varietyTemplate').attr('data-index');
        $('#varietyTemplate').remove();

        btnAddVariety.on('click', function(e) {
            e.preventDefault();
            var html = varietyTemplate.replace(/\{\{index\}\}/g, varietyIndex);
            varieties.prepend(html);
            varietyIndex++;
        });

        varieties.on('click', '.close-variety', function(e) {
            e.preventDefault();
            if ( confirm('Вы точно хотите удалить эту разновидность?') )
                $(this).parent().remove();
        });
        ////

        var attachmentTemplate = $('#attachmentTemplate').html();
        $('#attachmentTemplate').remove();
        varieties.on('click', '[data-category="add-variety-attachment"]', function(e) {
            e.preventDefault();
            var el = $(this);
            var html = attachmentTemplate.replace(/\{\{varietyIndex\}\}/g,
                el.attr('data-variety-index'));
            html = html.replace(/\{\{fileIndex\}\}/g, el.attr("data-file-index"));

            el.attr("data-file-index", parseInt(el.attr("data-file-index")) + 1);

            var fileList = $('[data-category="variety-attachments"][data-content="'
                + el.attr('data-variety-index') + '"]');
            fileList.prepend(html);
        });

        varieties.on('click', '.close-file', function(e) {
            e.preventDefault();
            if ( confirm('Вы точно хотите удалить этот файл?') )
                $(this).parent().remove();
        });

    });
})(jQuery);