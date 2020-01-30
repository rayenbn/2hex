export default class HeatTransferService {

    calculateTransferPrice(colorCount, totalQuantity, quantity) {

        let heatTransferSheets = 0.1;
        let marginTransfer = 0;

        if (colorCount < 5) {
            heatTransferSheets = 0.45;

            if (totalQuantity < 1000) {
                marginTransfer = 0.2;
            } else if (totalQuantity >= 1000 && totalQuantity < 6000) {
                marginTransfer = 0.15;
            } else {
                marginTransfer = 0.1;
            }
        }

        console.log('heatTransferSheets: ', heatTransferSheets);
        console.log('marginTransfer: ', marginTransfer);
        console.log('calculateCostPerTransfer: ', (heatTransferSheets + marginTransfer) * quantity);

        return parseFloat(
            Number((heatTransferSheets + marginTransfer) * quantity).toFixed(2)
        );
    }

    calculateScreensPrice(colorsQuantity, totalColorsQuantity, transparent = false, CMYK = false) {
        let totalPrice = 0;

        if (CMYK) {
            totalPrice += this.CMYKPrice(totalColorsQuantity);
        } else {
            totalPrice += this.colorQuantityPrice(totalColorsQuantity) * colorsQuantity;
        }

        if (transparent) {
            totalPrice += this.transparentPrice(totalColorsQuantity);
        }

        console.log('calculateProfitMargin: ' + totalPrice);

        return parseFloat(Number(totalPrice).toFixed(2));

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
        console.log(colorsQuantity);

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
}
