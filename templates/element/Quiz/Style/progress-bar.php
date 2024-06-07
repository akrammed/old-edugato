<style>
.container-loading {
    margin: 60px auto;
    width: 400px;
    text-align: center;
    margin-bottom: 2%;
}

.container-loading .progress {
    margin: 0 auto;
    width: 600px;
    margin-left: -26%;
    margin-top: -5%;
    height: 17px;
    background-color: #ECEFF4 !important;
}

.progress {
    padding: 4px;
    background: rgba(0, 0, 0, 0.25);
    border-radius: 6px;
}

.progress-bar {
    height: 16px;
    border-radius: 4px;
    background-image: -webkit-linear-gradient(top, rgba(255, 255, 255, 0.3), rgba(255, 255, 255, 0.05));
    background-image: -moz-linear-gradient(top, rgba(255, 255, 255, 0.3), rgba(255, 255, 255, 0.05));
    background-image: -o-linear-gradient(top, rgba(255, 255, 255, 0.3), rgba(255, 255, 255, 0.05));
    background-image: linear-gradient(to bottom, rgba(255, 255, 255, 0.3), rgba(255, 255, 255, 0.05));
    -webkit-transition: 0.4s linear;
    -moz-transition: 0.4s linear;
    -o-transition: 0.4s linear;
    transition: 0.4s linear;
    -webkit-transition-property: width, background-color;
    -moz-transition-property: width, background-color;
    -o-transition-property: width, background-color;
    transition-property: width, background-color;
    -webkit-box-shadow: 0 0 1px 1px rgba(0, 0, 0, 0.25), inset 0 1px rgba(255, 255, 255, 0.1);
    box-shadow: 0 0 1px 1px rgba(0, 0, 0, 0.25), inset 0 1px rgba(255, 255, 255, 0.1);
}


#five:checked~.progress>.progress-bar {
    width: 5%;
    margin-top: -0.5%;
    background-color: #5C17E5;
    margin-left: 0%;
}

#twentyfive:checked~.progress>.progress-bar {
    width: 25%;
    margin-top: -0.5%;
    background-color: #5C17E5;
    margin-left: 0%;
}

#fifty:checked~.progress>.progress-bar {
    width: 50%;
    margin-top: -0.5%;
    background-color: #5C17E5;
    margin-left: 0%;
}


#seventyfive:checked~.progress>.progress-bar {
    width: 75%;
    margin-top: -0.5%;
    background-color: #5C17E5;
    margin-left: 0%;
}

#onehundred:checked~.progress>.progress-bar {
    width: 100%;
    margin-top: -0.5%;
    background-color: #5C17E5;
    margin-left: 0%;
}
</style>