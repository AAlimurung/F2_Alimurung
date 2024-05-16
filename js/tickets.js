document.getElementById('event-type').addEventListener('change', function(){
    var ticketF = document.getElementById('ticket-field');
    if(this.value === 'PRIVATE' || this.value === 'SEMI-PUBLIC'){
        ticketF.style.display = 'block';
    } else if(this.value === 'PUBLIC'){
        ticketF.style.display = 'none';
        ticketF.querySelector('input').required = false;
    }
});