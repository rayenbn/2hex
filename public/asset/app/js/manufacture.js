   

var app = new Vue({
    el: '#app',
    data:{
            colorData: {
                'natural'       : '#FFE4C4', 
                'brown'         : '#A52A2A',
                'orange'        : '#FFA500',
                'red'           : 'red',
                'lime green'     : '#32CD32',
                'black'         : 'black',
                'yellow'        : 'yellow',
                'green'         : 'green',
                'grey'          : 'grey',
                'purple'        : '#800080',
                'pink'          : '#FFC0CB',
                'blue'          : 'blue',
                'scarlet'       : '#ff2400',
                'dark blue'      : '#00008B',
                'deep violet'    : '#9400D3',
                'wood red'       : '#65000b',
                'royal purple'   : '#9370DB',
                'light blue'     : '#87CEFA',
                'yellowish brown': '#F4A460',
            },
            colorNames: ['natural', 'brown', 'orange', 'red', 'lime green', 'black', 'yellow', 'green', 'grey', 'purple', 'pink', 'blue', 'scarlet', 'dark blue', 'deep violet', 'wood red', 'royal purple', 'light blue', 'yellowish brown'],
            partNames: [0, 1, 2, 3, 4, 5, 6],
            currentColors:['natural', 'natural', 'natural', 'natural', 'natural', 'natural', 'natural'],
            title: 'Skateboard Deck Configurator',
            randomColors: [],
            currentStep: 0,
            
            steps: [ {state: false}, 
                    {state: true}, 
                    {state: true}, 
                    {state: true}, 
                    {state: true},                      
                     {state: true, name: ''}, 
                     {state: true, name: ''}, 
                     {state: true, name: ''}, 
                    {   fulldip: {state: false, 
                                    color: ""}, 
                        transparent: {state: false, 
                                        color: ""}, 
                        metallic: {state: false, 
                                    color: ""}, 
                        blacktop: {state: false}, 
                        blackmidlayer: {state: false}, 
                        pattern: {state: false}, 
                    },                     
                    {state: true, name: ''}, 
                    {state: true, name: ''}, ],
    },
    computed: {
        progressWidth: function(){
            return {
                width: 100 * this.currentStep / 10 + '%',
            }
        },
    },
    create: function(){
        renderProduct()
    },
    methods: {

        color: function(index){
            if(index < 19)
                return this.colorNames[index]
            else
                return 'white';
        },
        currentColor: function(index){
            if(index < 7)
                return this.currentColors[index]
            else
                return 'white';
        },
        colorClicked: function(event){            
            var part, color
            if(event.target.getAttribute('data-part-id') == null){
                part = parseInt(event.target.parentElement.getAttribute('data-part-id'))
                color = event.target.parentElement.getAttribute('data-color-name')
            }else{
                part = parseInt(event.target.getAttribute('data-part-id'))
                color = event.target.getAttribute('data-color-name')
           }                
            this.currentColors[part] = color;            
            renderProduct()
        },
        randomClicked: function(event){
            renderRandomProduct()
        },
        nextStep: function(){
            if(this.currentStep < 10)
                this.currentStep++;
        },
        prevStep: function(){
            if(this.currentStep > 0)
                this.currentStep--;
            
        },
    }

})

const baseImgURL = 'skateboard-deck-production/8.1 veneers/';
function renderProduct(){
    validateColorPanel()    
    var imgArr = []
    for(var i = 0; i < app.currentColors.length; i++){
        imgArr.push(baseImgURL + app.currentColors[i] + '/000' + (i + 1) + ".png")
    }
    mergeImages(imgArr)
    .then(b64 => document.getElementById('productCanvas').src = b64);
}

function renderRandomProduct(){
    for(var i = 0; i < app.currentColors.length; i++){
        app.currentColors[i] = app.colorNames[parseInt(Math.random() * 100 % 19)]
    }    
    renderProduct()
}
function validateColorPanel(){
    var dropdownMenus = document.getElementsByClassName('skate-color-dropdown-menu');
    for(var i = 0; i < dropdownMenus.length; i++){
        dropdownMenus[i].firstElementChild.innerHTML = (i + 1) + ". " + app.currentColors[i]
        dropdownMenus[i].lastElementChild.style.setProperty('background', app.colorData[app.currentColors[i]])
    }
}
function gotoStep(step){
    app.currentStep = step - 1
    WizardDemo.gotoStep(step)
}
renderProduct()