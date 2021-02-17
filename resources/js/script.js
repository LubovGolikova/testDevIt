const roleFields = document.querySelectorAll('.role');
for(const roleField of roleFields){
    roleField.addEventListener('change', function(){
       const user_id = roleField.closest('tr').dataset.user;
        const selected_role = roleField.options[roleField.selectedIndex].value;
        axios.post('/user/change-role', {
            id: user_id,
            role: selected_role
        })
            .then(function (response) {
                if(response.data == 'ok'){
                    $('.toast').toast('show')
                }
            })
            .catch(function (error) {
                console.log(error);
            });
    });
}

const banFields = document.querySelectorAll('.ban');
for(const banField of banFields){
    banField.addEventListener('click', function(e){
        e.preventDefault()
        const user_id = banField.closest('tr').dataset.user;
        axios.post('/user/change-ban', {
            id: user_id
        })
            .then(function (response) {
                if(response.data == 1){
                    banField.classList.remove('btn-success')
                    banField.classList.add('btn-danger')
                    banField.textContent='Отменить бан'
                    $('.toast').toast('show')
                }
                if(response.data == 0){
                    banField.classList.remove('btn-danger')
                    banField.classList.add('btn-success')
                    banField.textContent='Отправить в бан'
                    $('.toast').toast('show')
                }
            })
            .catch(function (error) {
                console.log(error);
            });
    });
}

