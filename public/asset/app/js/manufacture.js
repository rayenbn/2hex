   

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
            quantity: 0,
            total_quantity: 0,
            total: 0,
            perdeck: 0,
            size: "",
            pre_quantity: 0,
            pre_size: "",
            steps: [ {state: false}, 
                    {state: true}, 
                    {state: true}, 
                    {state: true}, 
                    {state: false},                      
                     {state: false, name: ''}, 
                     {state: false, name: ''}, 
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
                    {state: false, name: ''}, 
                    {state: false, name: ''}, ],
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
            org_c = 0;   
            for(i = 0; i < this.currentColors.length; i ++){
                if(this.currentColors[i] != 'natural')
                    org_c ++;
            }
            this.currentColors[part] = color;         
            c = 0;   
            for(i = 0; i < this.currentColors.length; i ++){
                if(this.currentColors[i] != 'natural')
                    c ++;
            }

            if(org_c == 0 && c > 0)
              this.perdeck += 0.4;
            else if(org_c < c && c > 3)
              this.perdeck += 0.4;
            else if(org_c > c && c > 2)
              this.perdeck -= 0.4;
            else if(c == 0 && org_c > 0)
              this.perdeck -= 0.4;
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
        sizeChange: function(){

            if(this.pre_size != ""){
                if(this.pre_size < '8')
                  this.perdeck -= 8.5;
                else if(this.pre_size < '8.5')
                  this.perdeck -= 9.5;
                else
                  this.perdeck -= 10;                
            }

            if(this.size < '8')
              this.perdeck += 8.5;
            else if(this.size < '8.5')
              this.perdeck += 9.5;
            else
              this.perdeck += 10;

            this.pre_size = this.size;
        },
        quantityChange: function(){


          debugger;
            if(this.pre_quantity > 0){
                if(this.total_quantity <= 10)
                  this.perdeck -= 50;
                else if(this.total_quantity <= 20)
                  this.perdeck -= 40;
                else if(this.total_quantity <= 30)
                  this.perdeck -= 30;
                else if(this.total_quantity <= 50)
                  this.perdeck -= 6;
                else if(this.total_quantity <= 100)
                  this.perdeck -= 4;
                else if(this.total_quantity <= 200)
                  this.perdeck -= 3;
                else if(this.total_quantity <= 300)
                  this.perdeck -= 2.5;
                else if(this.total_quantity <= 500)
                  this.perdeck -= 1.5;
                else if(this.total_quantity <= 1000)
                  this.perdeck -= 1;
                else if(this.total_quantity <= 2000)
                  this.perdeck -= 0.5;
                else 
                  this.perdeck -= 0;                
            }

            this.total_quantity += (this.quantity * 1);
            this.pre_quantity = this.quantity;
            if(this.total_quantity <= 10)
              this.perdeck += 50;
            else if(this.total_quantity <= 20)
              this.perdeck += 40;
            else if(this.total_quantity <= 30)
              this.perdeck += 30;
            else if(this.total_quantity <= 50)
              this.perdeck += 6;
            else if(this.total_quantity <= 100)
              this.perdeck += 4;
            else if(this.total_quantity <= 200)
              this.perdeck += 3;
            else if(this.total_quantity <= 300)
              this.perdeck += 2.5;
            else if(this.total_quantity <= 500)
              this.perdeck += 1.5;
            else if(this.total_quantity <= 1000)
              this.perdeck += 1;
            else if(this.total_quantity <= 2000)
              this.perdeck += 0.5;
            else 
              this.perdeck += 0;
        }
    }

})

const baseImgURL = '/skateboard-deck-production/8.1 veneers/';
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
