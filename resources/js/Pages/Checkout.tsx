import {PayPalButtons, PayPalScriptProvider} from "@paypal/react-paypal-js";
import {useState} from "react";
import {SuccessModal} from "@/Components/SuccessModal";
import PrimaryButton from "@/Components/PrimaryButton";
import PaymentImage from "@/Components/PaymentImage";

// todo recibir props desde el controlador
export default function Checkout() {
    const [paymentStatus, setPaymentStatus] = useState<'idle' | 'processing' | 'success' | 'error'>('idle')
    const [showSuccessModal, setShowSuccessModal] = useState(false)

    const handlePayment = () => {
        setPaymentStatus('processing')
        // Simulate payment processing
        setTimeout(() => {
            const isSuccess = Math.random() > 0.5
            setPaymentStatus(isSuccess ? 'success' : 'error')
            if (isSuccess) {
                setShowSuccessModal(true)
            }
        }, 2000)
    }
    const initialOptions = {
        clientId: import.meta.env.VITE_PAYPAL_CLIENT_ID,
        currency: 'CLP',
        intent: 'capture'
    }

    return (
        <PayPalScriptProvider options={initialOptions}>
            <div className="h-screen w-screen flex flex-col md:flex-row">
                <div className="w-full md:w-1/2 h-1/2 md:h-full relative">
                    {/*todo implementar componente con la imagen*/}
                   <PaymentImage />
                </div>

                <div className="w-full md:w-1/2 h-1/2 md:h-full bg-white p-8 flex flex-col justify-center">
                    <div className="max-w-md mx-auto w-full">
                        <h2 className="text-3xl font-bold mb-6">Completa tu compra!</h2>
                        <div className="space-y-4 mb-6">
                            <div className="flex justify-between items-center">
                                <span className="font-medium">Product:</span>
                                <span>Premium Subscription</span>
                            </div>
                            <div className="flex justify-between items-center">
                                <span className="font-medium">Price:</span>
                                <span>$19.99</span>
                            </div>
                        </div>
                        <PrimaryButton
                            className="w-full bg-[#0070ba] hover:bg-[#003087] text-white flex items-center justify-center space-x-2 h-12 text-lg"
                            onClick={handlePayment}
                            disabled={paymentStatus === 'processing'}
                        >
                            {/*todo implementar svg aqui para loading y no loading*/}
                            {paymentStatus === 'processing' ? (
                                <div>loading</div>
                            ) : (
                                <div>No loading</div>
                            )}
                            <span>{paymentStatus === 'processing' ? 'Processing...' : 'Pay with PayPal'}</span>
                        </PrimaryButton>
                        {paymentStatus === 'error' && (
                            <div className="mt-4 text-red-600 text-center" role="alert">
                                Payment failed. Please try again.
                            </div>
                        )}
                    </div>
                </div>
                <SuccessModal isOpen={showSuccessModal} onClose={() => setShowSuccessModal(false)}/>
                <PayPalButtons style={{layout: "vertical"}}/>
            </div>
        </PayPalScriptProvider>
    )
}

