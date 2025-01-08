<script>
    async function downloadQR(url) {
        const response = await fetch(url);
        const svgText = await response.text();
        const canvas = document.createElement('canvas');
        const ctx = canvas.getContext('2d');
        const img = new Image();
        img.src = 'data:image/svg+xml,' + encodeURIComponent(svgText);
        img.onload = () => {
            canvas.width = 1000;
            canvas.height = 1000;
            const qrSize = Math.min(canvas.width, canvas.height);
            const qrX = (canvas.width - qrSize) / 2;
            const qrY = (canvas.height - qrSize) / 2;
            ctx.drawImage(img, qrX, qrY, qrSize, qrSize);
            const jpgUrl = canvas.toDataURL('image/jpeg');
            const downloadLink = document.createElement('a');
            downloadLink.href = jpgUrl;
            downloadLink.download = 'image.jpg';
            document.body.appendChild(downloadLink);
            downloadLink.click();
            document.body.removeChild(downloadLink);
        };
    }

    function copyInput(inputId) {
        const input = $('#' + inputId);
        input.select();
        input[0].setSelectionRange(0, 99999);
        document.execCommand("copy");
        showAlert({
            title: 'Success!',
            text: 'Copied to clipboard.',
            icon: 'success'
        })
    }

    function generateShortURL() {
        const selectedType = $('.nav-pills .active').attr('href').substring(1);
        var formData = {};
        $('input[name^="' + selectedType + '["][name$="]"]').each(function () {
            const key = $(this).attr('name').replace(selectedType + '[', '').replace(']', '');
            formData[key] = $(this).val();
        });
        $('select[name^="' + selectedType + '["][name$="]"]').each(function () {
            const key = $(this).attr('name').replace(selectedType + '[', '').replace(']', '');
            formData[key] = $(this).val();
        });
        showLoader();
        $.ajax({
            url: '{{ route('api.url-generate') }}',
            type: 'POST',
            data: {
                type: selectedType,
                data: formData
            },
            success: function (response) {
                if (response.status != 'success') {
                    showAlert({
                        title: 'Error!',
                        text: 'An error occurred while generating the short URL.',
                        icon: 'error'
                    })
                }
                showAlert({
                    title: 'Success!',
                    text: 'Short URL & QR Code Generated Successfully.',
                    icon: 'success'
                });
                if(response.data.is_our_url == 0) {
                    $('#short_url_panel').hide();
                }else{
                    $('#short_url_panel').show();
                }
                const qrCodeImage = $('#qr_image');
                const qrButton = $('#qr_button');
                const linkInput = $('#link_input');
                const linkButton = $('#link_button');

                qrCodeImage.attr('src', response.data.qr_code);
                qrButton.removeAttr('disabled');
                qrButton.removeAttr('onclick');
                qrButton.removeClass('btn-dark');
                qrButton.removeClass('disabled');
                qrButton.addClass('btn-success');
                qrButton.attr('onclick', "downloadQR('" + response.data.qr_code + "')");


                linkInput.removeAttr('disabled');
                linkInput.val(response.data.short_link);
                linkButton.removeAttr('disabled');
                linkButton.removeClass('btn-dark');
                linkButton.addClass('btn-success');
            },
            error: function (response) {
                showAlert({
                    title: 'Error!',
                    text: 'An error occurred while generating the short URL.',
                    icon: 'error'
                })
            }
        });
    }

    function showTab(id) {
        $('.tab-pane').hide();
        $('#' + id).show();
    }
</script>
