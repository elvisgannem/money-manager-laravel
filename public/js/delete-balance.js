const deleteOperation = (id, type) => {
    const confirmButton = document.querySelector('.confirm-button');
    const cancelButton = document.querySelector('.cancel-button');
    showModal('remove', 'add');

    cancelButton.addEventListener('click', () => {
        showModal('add', 'remove');
    });

    confirmButton.addEventListener('click', () => {
        confirmDestroy(id, type);
    })
}

const confirmDestroy = (id, type) => {
    const token = document.querySelector("[name=_token]").value;
    const formData = new FormData();
    formData.append('_token', token);
    formData.append('id', id);

    fetch(`/${type}/delete`, {
        method: 'POST',
        body: formData
    })
        .then(res => res.json())
        .then(data => {
            if(data) document.location.reload()
        });
}

function toggleBlurBackground(type) {
    const blurSections = [];
    blurSections.push(document.body.getElementsByTagName('main')[0]);
    blurSections.push(document.body.getElementsByTagName('header')[0]);

    blurSections.forEach((section) => {
        section.classList[type]('blur-background');
    });
}

const showModal = (backgroundHidden, blurBackground) => {
    const backgroundModal = document.querySelector('.bg-modal-destroy');
    backgroundModal.classList[backgroundHidden]('hidden');
    toggleBlurBackground(blurBackground);
}
