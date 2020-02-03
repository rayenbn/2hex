import {CMYK_COLORS_COUNT} from '@/constants.js';

class HeatTransferService {

    /**
     * Calculate Transfer price
     *
     * @param colorCount
     * @param totalQuantity
     * @param quantity
     * @param isCMYK
     * @returns {number}
     */
    calculateTransferPrice(colorCount, totalQuantity, quantity, isCMYK = false) {
        let marginTransfer = 0;
        let addedPerColor = 0;

        if (totalQuantity < 1000) {
            marginTransfer = 0.2;
        } else if (totalQuantity >= 1000 && totalQuantity < 6000) {
            marginTransfer = 0.15;
        } else {
            marginTransfer = 0.1;
        }

        if (isCMYK) {
            addedPerColor += CMYK_COLORS_COUNT * 0.1;

        } else if (colorCount > 4) {
            addedPerColor += (colorCount - 4) * 0.1;
        }

        return parseFloat(
            Number(quantity * (0.45 + marginTransfer + addedPerColor)).toFixed(2)
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
        let price = (25 * CMYK_COLORS_COUNT) + 15;

        switch(true) {
            case colorsQuantity < 10: price += (20 * CMYK_COLORS_COUNT); break;
            case colorsQuantity >= 10 && colorsQuantity < 29: price += (15 * CMYK_COLORS_COUNT); break;
            case colorsQuantity >= 30: price += (10 * CMYK_COLORS_COUNT); break;
        }

        return price;
    }
}

export default HeatTransferService;
