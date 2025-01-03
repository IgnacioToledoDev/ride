import {PayPalButtons, PayPalScriptProvider} from "@paypal/react-paypal-js";

export default function Checkout() {

    const initialOptions = {
        clientId: import.meta.env.VITE_PAYPAL_CLIENT_ID,
        currency: 'CLP',
        intent: 'capture'
    }

    return (
        <PayPalScriptProvider options={initialOptions}>
            <PayPalButtons style={{ layout: "horizontal" }} />
        </PayPalScriptProvider>
    )
}
