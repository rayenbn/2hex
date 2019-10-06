import {PLACEMENTS} from '@/constants.js';

export default class WheelSertice {

	static calculatePerSet(total, quantity) {

		let perSet = 0;

		if (total < 1170) {
			switch (true) {
				case quantity < 600 : perSet = 1.55; break;
				case quantity >= 600 && quantity < 900 : perSet = 1; break;
				case quantity >= 900 && quantity < 1200 : perSet = 1; break;
				case quantity >= 1200 && quantity < 1900 : perSet = 1; break;
				case quantity >= 1900 : perSet = 1; break;
			} 

		}

		else if (total >= 1170 && total < 3000) {
			switch (true) {
				case quantity < 600 : perSet = 1.5; break;
				case quantity >= 600 && quantity < 900 : perSet = 1.2; break;
				case quantity >= 900 && quantity < 1200 : perSet = 1.1; break;
				case quantity >= 1200 && quantity < 1900 : perSet = 0.94; break;
				case quantity >= 1900 : perSet = 0.94; break;
			} 
		}

		else if (total >= 3000 && total < 6000) {
			switch (true) {
				case quantity < 600 : perSet = 1.4; break;
				case quantity >= 600 && quantity < 900 : perSet = 1; break;
				case quantity >= 900 && quantity < 1200 : perSet = 1; break;
				case quantity >= 1200 && quantity < 1900 : perSet = 0.93; break;
				case quantity >= 1900 : perSet = 0.7; break;
			} 
		}

		else if (total >= 6000 && total < 8000) {
			switch (true) {
				case quantity < 600 : perSet = 1.2; break;
				case quantity >= 600 && quantity < 900 : perSet = 0.7; break;
				case quantity >= 900 && quantity < 1200 : perSet = 0.7; break;
				case quantity >= 1200 && quantity < 1900 : perSet = 0.65; break;
				case quantity >= 1900 : perSet = 0.6; break;
			} 
		}

		else if (total >= 8000 && total < 12000) {
			switch (true) {
				case quantity < 600 : perSet = 1.1; break;
				case quantity >= 600 && quantity < 900 : perSet = 0.65; break;
				case quantity >= 900 && quantity < 1200 : perSet = 0.45; break;
				case quantity >= 1200 && quantity < 1900 : perSet = 0.45; break;
				case quantity >= 1900 : perSet = 0.45; break;
			} 
		}

		else if (total >= 12000 && total < 20000) {
			switch (true) {
				case quantity < 600 : perSet = 1; break;
				case quantity >= 600 && quantity < 900 : perSet = 0.6; break;
				case quantity >= 900 && quantity < 1200 : perSet = 0.35; break;
				case quantity >= 1200 && quantity < 1900 : perSet = 0.35; break;
				case quantity >= 1900 : perSet = 0.3; break;
			} 
		}

		else if (total >= 20000 && total < 30000) {
			switch (true) {
				case quantity < 600 : perSet = 0.9; break;
				case quantity >= 600 && quantity < 900 : perSet = 0.55; break;
				case quantity >= 900 && quantity < 1200 : perSet = 0.33; break;
				case quantity >= 1200 && quantity < 1900 : perSet = 0.33; break;
				case quantity >= 1900 : perSet = 0.27; break;
			} 
		}

		else if (total >= 30000) {
			switch (true) {
				case quantity < 600 : perSet = 0.8; break;
				case quantity >= 600 && quantity < 900 : perSet = 0.5; break;
				case quantity >= 900 && quantity < 1200 : perSet = 0.33; break;
				case quantity >= 1200 && quantity < 1900 : perSet = 0.33; break;
				case quantity >= 1900 : perSet = 0.25; break;
			} 
		}

      	console.log('calculatePerSet=' + perSet);

      	return perSet;
   	}

   	static calculateColorPrice(colors, colorMargin, colorPrice) {

   		let color = 1;

   		switch(true) {
   			case colors == '1 color' : color = 1; break;
   			case colors == '2 color' : color = 2; break;
   			case colors == '3 color' : color = 3; break;
   			case colors == 'CMYK' 	 : color = 4; break;
   		}

   		return parseFloat((color * colorMargin * colorPrice).toFixed(2));
   	}

   	static calculatePlacementPrice(placement) {
		switch(placement) {
            case PLACEMENTS.SQUARE: return 0;
            case PLACEMENTS.ROLL: return 0.05;
            case PLACEMENTS.LINE: return 0.08; 
        }

        return 0;
   	} 
}