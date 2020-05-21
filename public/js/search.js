function activityFilter(){
    let input_value = $('#search').val();
    $('.card').each(function(){
        let activity_name = $(this).find('.card-header h4 .activity-name').html();                     
        if(activity_name.indexOf(input_value) == -1) $(this).hide();
        else $(this).show();
    });
}
