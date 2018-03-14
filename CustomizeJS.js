window.changeColour = function(value)
{
    var color = document.body.style.backgroundColor;
    switch(value)
    {
        case 'a':
            color = "#7CB00B";
        break;
        case 'b':
            color = "#14A5DC";
        break;
        case 'c':
            color = "#A90AD3";
        break;
    }
    document.body.style.backgroundColor = color;
}