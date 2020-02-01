class HeatTransferService {

    /**
     * Calculate Transfer price
     *
     * @param colorCount
     * @param totalQuantity
     * @param quantity
     * @returns {number}
     */
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

        return parseFloat(
            Number((heatTransferSheets + marginTransfer) * quantity).toFixed(2)
        );
    }

    /**
     * Calculate Screens price
     *
     * @param colorsQuantity
     * @param totalColorsQuantity
     * @param transparent
     * @param CMYK
     * @returns {number}
     */
    calculateScreensPrice(colorsQuantity, totalColorsQuantity, transparent = false, CMYK = false) {
        let totalPrice = 0;

        if (CMYK) {
            totalPrice += this.CMYKPrice(totalColorsQuantity);
        } else {
            totalPrice += this.colorQuantityPrice(totalColorsQuantity) * colorsQuantity;
        }

        return parseFloat(Number(totalPrice).toFixed(2));
    }

    /**
     * Calculate profit margin from colors
     *
     * @param colorsQuantity
     * @returns {number}
     */
    colorQuantityPrice(colorsQuantity) {
        let price = 25;

        switch(true) {
            case colorsQuantity < 10: price += 20; break;
            case colorsQuantity >= 10 && colorsQuantity < 29: price += 15; break;
            case colorsQuantity >= 30: price += 10; break;
        }

        return price;
    }

    /**
     * Calculate transparent price
     *
     * @param colorsQuantity
     * @returns {number}
     */
    transparentPrice(colorsQuantity) {
        let price = 25;

        switch(true) {
            case colorsQuantity < 10: price += 20; break;
            case colorsQuantity >= 10 && colorsQuantity < 29: price += 15; break;
            case colorsQuantity >= 30: price += 10; break;
        }

        return price;
    }

    /**
     * Calculate CMYK price
     *
     * @param colorsQuantity
     * @returns {number}
     */
    CMYKPrice(colorsQuantity) {
        let price = (25 * 4) + 15;

        switch(true) {
            case colorsQuantity < 10: price += (20 * 4); break;
            case colorsQuantity >= 10 && colorsQuantity < 29: price += (15 * 4); break;
            case colorsQuantity >= 30: price += (10 * 4); break;
        }

        return price;
    }
}

export default HeatTransferService;
