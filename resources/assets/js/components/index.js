import VendorCode from './VendorCode.vue';
import Steps from './Steps.vue';
import BtnOrderLater from './BtnOrderLater.vue';
import SkateboardDecksConfigurator from './configurator/SkateboardDecksConfigurator.vue';
import GripTapeConfigurator from './griptape-configurator/GripTapeConfigurator.vue';
import SkateboardWheelConfigurator from './skateboard-wheel-configurator/SkateboardWheelConfigurator.vue';
import HeatTransferConfigurator from "./heat-transfer-configurator/HeatTransferConfigurator";

// Forms
import FormUserDetails from './forms/UserDetails.vue';
import FormDeliveryAddress from './forms/DeliveryAddress.vue';

// Modals
import ChangeNameOrderModal from './modals/ChangeNameOrderModal.vue';
import SubmitOrderModal from './modals/SubmitOrderModal.vue';

export default [
    VendorCode,
    SkateboardDecksConfigurator,
    GripTapeConfigurator,
    SkateboardWheelConfigurator,
    HeatTransferConfigurator,
    Steps,
    FormUserDetails,
    FormDeliveryAddress,
    ChangeNameOrderModal,
    BtnOrderLater,
    SubmitOrderModal
];