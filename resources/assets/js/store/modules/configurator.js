export default {
    namespaced: true,
    state: {
        skateboard: {
            steps: [ 
                {state: false}, 
                {state: true}, 
                {state: true}, 
                {state: true}, 
                {state: false},                      
                {state: false, name: ''}, 
                {state: false, name: ''}, 
                {state: true, name: ''}, 
                {
                    fulldip: {state: false,color: ""}, 
                    transparent: {state: false, color: ""}, 
                    metallic: {state: false, color: ""}, 
                    blacktop: {state: false}, 
                    blackmidlayer: {state: false}, 
                    pattern: {state: false}, 
                },                     
                {state: false, name: ''}, 
                {state: false, name: ''}, 
            ]  
        }

    },
    getters: {
        getStepByIndex: state => index => {
            return state.skateboard.steps[index];
        },
    	skateboardSteps: state => state.skateboard.steps,
    },
    mutations: {
        changeState(state, payload) {
            state.skateboard.steps[payload.index].state = payload.data;
        }
    },
    actions: {}
};