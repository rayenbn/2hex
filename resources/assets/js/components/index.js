import VendorCode from './VendorCode.vue';
import Steps from './Steps.vue';
import BtnOrderLater from './BtnOrderLater.vue';
import SkateboardDecksConfigurator from './configurator/SkateboardDecksConfigurator.vue';
import GripTapeConfigurator from './griptape-configurator/GripTapeConfigurator.vue';
import SkateboardWheelConfigurator from './skateboard-wheel-configurator/SkateboardWheelConfigurator.vue';
import TransfersConfigurator from './transfers/TransfersConfigurator.vue';
import BearingConfigurator from './bearing/BearingConfigurator.vue';
import BoltConfigurator from './bolt/BoltConfigurator.vue';

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
    TransfersConfigurator,
    Steps,
    FormUserDetails,
    FormDeliveryAddress,
    ChangeNameOrderModal,
    BtnOrderLater,
    SubmitOrderModal,
    BearingConfigurator,
    BoltConfigurator
];