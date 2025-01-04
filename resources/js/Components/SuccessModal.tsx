import { useEffect, useState } from 'react'
import PrimaryButton from "@/Components/PrimaryButton";

interface SuccessModalProps {
    isOpen: boolean
    onClose: () => void
}

// todo implementar este modal
export function SuccessModal({ isOpen, onClose }: SuccessModalProps) {
    const [countdown, setCountdown] = useState(5)

    useEffect(() => {
        if (isOpen) {
            const timer = setInterval(() => {
                setCountdown((prev) => {
                    if (prev <= 1) {
                        clearInterval(timer)
                    }
                    return prev - 1
                })
            }, 1000)

            return () => clearInterval(timer)
        }
    }, [isOpen])

    return (
        <section>
            <div className="sm:max-w-md">
                <header>
                    <h2 className="text-2xl">Payment Successful!</h2>
                    <p className="text-lg">
                        Thank you for your purchase. You will be redirected to the dashboard in {countdown} seconds.
                    </p>
                </header>
                <div className="flex justify-end space-x-2 mt-4">
                    <PrimaryButton>
                        Go to Dashboard Now
                    </PrimaryButton>
                </div>
            </div>
        </section>
    )
}

