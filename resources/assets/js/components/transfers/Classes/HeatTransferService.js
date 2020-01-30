export default class HeatTransferService {

    calculateCostPerTransfer(colorCount, sheetsQuantity) {

        if (colorCount > 5) {

            console.log('calculateCostPerTransfer', 0.1);
            return 0.1

        } else if (colorCount < 5) {

            let perColor = 0.45;

            if (sheetsQuantity < 1000) {
                console.log('calculateCostPerTransfer', perColor + 0.2);
                return perColor + 0.2;
            } else if (sheetsQuantity >= 1000 && sheetsQuantity < 6000) {
                console.log('calculateCostPerTransfer', perColor + 0.15);
                return perColor + 0.15;
            } else {
                console.log('calculateCostPerTransfer', perColor + 0.1);
                return perColor + 0.1;
            }
        }
    }

    calculateCostPerSheet(colorsQuantity, totalColorsQuantity, transparent = false, CMYK = false) {
        let totalPrice = 0;
        console.log(colorsQuantity, totalColorsQuantity, transparent, CMYK);

        if (CMYK) {
            totalPrice += this.CMYKPrice(totalColorsQuantity);
        } else {
            totalPrice += this.colorQuantityPrice(totalColorsQuantity) * colorsQuantity;
        }

        if (transparent) {
            totalPrice += this.transparentPrice(totalColorsQuantity);
        }

        console.log('calculateProfitMargin: ' + totalPrice);
        return totalPrice;

    }

    colorQuantityPrice(colorsQuantity) {
        let price = 25;

        switch(true) {
            case colorsQuantity < 10: price += 20; break;
            case colorsQuantity >= 10 && colorsQuantity < 29: price += 15; break;
            case colorsQuantity >= 30: price += 10; break;
        }
        console.log('colorQuantityPrice: ' + price);
        return price;
    }
    transparentPrice(colorsQuantity) {
        let price = 25;

        switch(true) {
            case colorsQuantity < 10: price += 20; break;
            case colorsQuantity >= 10 && colorsQuantity < 29: price += 15; break;
            case colorsQuantity >= 30: price += 10; break;
        }
        console.log('transparentPrice: ' + price);
        return price;
    }
    CMYKPrice(colorsQuantity) {
        let price = 115;

        switch(true) {
            case colorsQuantity < 10: price += 80; break;
            case colorsQuantity >= 10 && colorsQuantity < 29: price += 15; break;
            case colorsQuantity >= 30: price += 10; break;
        }
        console.log('CMYKPrice: ' + price);
        return price;
    }

    priceWithMargin(price, percent) {
        if (!percent || percent === 0) {
            return price;
        }

        let margin = price * percent / 100;

        if (margin === price) {
            return price;
        }

        return price + margin;
    }
}
