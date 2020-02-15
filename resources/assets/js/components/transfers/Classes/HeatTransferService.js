import {HEAT_TRANSFERS} from '@/constants';

class HeatTransferService {

    /**
     * Calculate Transfer price
     *
     * @param quantity
     * @param colorCount
     * @param totalQuantity
     * @param heatTransferPrice
     * @returns {number}
     */
    calculateTransferPrice(quantity, colorCount, totalQuantity, heatTransferPrice) {
        let marginTransfer = 0.1;
        let addedPerColor = 0;

        if (totalQuantity < 1000) {
            marginTransfer = 0.2;
        } else if (totalQuantity >= 1000 && totalQuantity < 6000) {
            marginTransfer = 0.15;
        }

        if ((colorCount - 4) > 0) {
            addedPerColor = (colorCount - 4) * 0.1;
        }

        return quantity * (0.45 + marginTransfer + addedPerColor + heatTransferPrice);
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

        return (colorsQuantity * this.colorQuantityPrice(totalColorsQuantity)) + (CMYK ? 15 : 0);
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

        return price;
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
}

export default HeatTransferService;
