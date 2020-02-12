import {HEAT_TRANSFERS} from '@/constants';

class HeatTransferService {

    /**
     * Calculate Transfer price
     *
     * @param colorCount
     * @param totalQuantity
     * @returns {number}
     */
    calculateTransferPrice(colorCount, totalQuantity) {
        let marginTransfer = 0.1;
        let addedPerColor = 0;

        if (totalQuantity < 1000) {
            marginTransfer = 0.2;
        } else if (totalQuantity >= 1000 && totalQuantity < 6000) {
            marginTransfer = 0.15;
        }

        if (colorCount > 4) {
            addedPerColor += colorCount * 0.1;
        }

        return parseFloat(
            Number(0.45 + marginTransfer + addedPerColor).toFixed(2)
        );
    }

    /**
     * Calculate Screens price
     *
     * @param colorsQuantity
     * @param totalColorsQuantity
     * @param CMYK
     * @returns {number}
     */
    calculateScreensPrice(colorsQuantity, totalColorsQuantity, CMYK = false) {
        let totalPrice = 0;

        if (CMYK) {
            totalPrice += this.CMYKPrice(totalColorsQuantity);
        } else {
            totalPrice += this.colorQuantityPrice(totalColorsQuantity) * colorsQuantity;
        }

        return parseFloat(Number(totalPrice).toFixed(2));
    }

    calculateHeatTransferPrice(heatTransfer, totalQuantity) {
        // Glossy Print: Standard, no extra cost
        let price = 0;

        if (heatTransfer.name === HEAT_TRANSFERS.MATTE) {
            price += 0.12;

            switch(true) {
                case totalQuantity < 1000: price += 0.32; break;
                case totalQuantity >= 1000 && totalQuantity < 6000: price += 0.22; break;
                case totalQuantity >= 6000: price += 0.11; break;
            }

        } else if (heatTransfer.name === HEAT_TRANSFERS.GLOSSY_MATTE) {
            price += 0.28;

            switch(true) {
                case totalQuantity < 1000: price += 0.36; break;
                case totalQuantity >= 1000 && totalQuantity < 6000: price += 0.26; break;
                case totalQuantity >= 6000: price += 0.16; break;
            }
        }

        return parseFloat(Number(price).toFixed(2));
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
